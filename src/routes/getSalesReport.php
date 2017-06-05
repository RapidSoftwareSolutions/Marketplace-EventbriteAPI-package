<?php

$app->post('/api/EventbriteAPI/getSalesReport', function ($request, $response, $args) {
    $settings =  $this->settings;
    
    $data = $request->getBody();

    if($data=='') {
        $post_data = $request->getParsedBody();
    } else {
        $toJson = $this->toJson;
        $data = $toJson->normalizeJson($data); 
        $data = str_replace('\"', '"', $data);
        $post_data = json_decode($data, true);
    }
    
    if(json_last_error() != 0) {
        $error[] = json_last_error_msg() . '. Incorrect input JSON. Please, check fields with JSON input.';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'JSON_VALIDATION';
        $result['contextWrites']['to']['status_msg'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $error = [];
    if(empty($post_data['args']['token'])) {
        $error[] = 'token';
    }
    if(empty($post_data['args']['eventIds'])) {
        $error[] = 'eventIds';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['token'];
    $query_str = $settings['api_url'] . 'reports/sales/';
    
    $body = [];
    if(!empty($post_data['args']['eventIds'])) {
        $body['event_ids'] = $post_data['args']['eventIds'];
    }
    if(!empty($post_data['args']['eventStatus'])) {
        $body['event_status'] = $post_data['args']['eventStatus'];
    }
    if(!empty($post_data['args']['startDate'])) {
        $date = new DateTime($post_data['args']['startDate']);
        if ($date) {
            $body['start_date'] = $date->format('Y-m-d\TH:i:s\Z');
        }
    }
    if(!empty($post_data['args']['endDate'])) {
        $date = new DateTime($post_data['args']['endDate']);
        if ($date) {
            $body['end_date'] = $date->format('Y-m-d\TH:i:s\Z');
        }
    }
    if(!empty($post_data['args']['period'])) {
        $body['period'] = $post_data['args']['period'];
    }
    if(!empty($post_data['args']['filterBy'])) {
        $body['filter_by'] = $post_data['args']['filterBy'];
    }
    if(!empty($post_data['args']['groupBy'])) {
        $body['group_by'] = $post_data['args']['groupBy'];
    }
    if(!empty($post_data['args']['dateFacet'])) {
        $body['date_facet'] = $post_data['args']['dateFacet'];
    }
    if(!empty($post_data['args']['timezone'])) {
        $body['timezone'] = $post_data['args']['timezone'];
    }
    if(!empty($post_data['args']['randomSeed'])) {
        $body['random_seed'] = $post_data['args']['randomSeed'];
    }
    
    $client = $this->httpClient;

    try {

        $resp = $client->get( $query_str, 
            [
                'headers' => $headers,
                'query' => $body
            ]);
        $responseBody = $resp->getBody()->getContents();
       
        if($resp->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
