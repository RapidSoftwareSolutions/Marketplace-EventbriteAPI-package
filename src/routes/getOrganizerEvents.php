<?php

$app->post('/api/EventbriteAPI/getOrganizerEvents', function ($request, $response, $args) {
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
    if(empty($post_data['args']['organizerId'])) {
        $error[] = 'organizerId cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['token'];
    $headers['Content-Type'] = 'application/json';
    $query_str = $settings['api_url'] . 'organizers/'.$post_data['args']['organizerId'].'/events/';
    
    $body = [];
    if(!empty($post_data['args']['status'])) {
        $body['status'] = $post_data['args']['status'];
    }
    if(!empty($post_data['args']['orderBy'])) {
        $body['order_by'] = $post_data['args']['orderBy'];
    }
    if(!empty($post_data['args']['startRangeDate'])) {
        $body['start_date.range_start'] = $post_data['args']['startRangeDate'];
    }
    if(!empty($post_data['args']['endRangeDate'])) {
        $body['start_date.range_end'] = $post_data['args']['endRangeDate'];
    }
    if(!empty($post_data['args']['onlyPublic'])) {
        $body['only_public'] = $post_data['args']['onlyPublic'];
    }
    
    $client = $this->httpClient;

    try {

        $resp = $client->get( $query_str, 
            [
                'headers' => $headers,
                'query' => $body
            ]);
        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());
        
        $all_data[] = $rawBody;
        
        if($rawBody->pagination->page_count != 1) {
            $pagin = $this->pager;
            $ret = $pagin->page($query_str, 2, $headers, 'events');
            
            $merge = array_merge($all_data[0]->events, $ret);
        
            $all_data[0]->events = $merge;
        }
        
        if($resp->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
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
