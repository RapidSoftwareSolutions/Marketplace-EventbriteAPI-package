<?php

$app->post('/api/EventbriteAPI/getAttendeesReport', function ($request, $response, $args) {
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
    
    $error = [];
    if(empty($post_data['args']['token'])) {
        $error[] = 'token cannot be empty';
    }
    if(empty($post_data['args']['eventIds'])) {
        $error[] = 'eventIds cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['token'];
    $query_str = $settings['api_url'] . 'reports/attendees/';
    
    $body = [];
    if(!empty($post_data['args']['eventIds'])) {
        $body['event_ids'] = $post_data['args']['eventIds'];
    }
    if(!empty($post_data['args']['eventStatus'])) {
        $body['event_status'] = $post_data['args']['eventStatus'];
    }
    if(!empty($post_data['args']['startDate'])) {
        $body['start_date'] = $post_data['args']['startDate'];
    }
    if(!empty($post_data['args']['endDate'])) {
        $body['end_date'] = $post_data['args']['endDate'];
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
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
