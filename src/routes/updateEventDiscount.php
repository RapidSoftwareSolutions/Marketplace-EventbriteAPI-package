<?php

$app->post('/api/EventbriteAPI/updateEventDiscount', function ($request, $response, $args) {
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
    if(empty($post_data['args']['eventId'])) {
        $error[] = 'eventId cannot be empty';
    }
    if(empty($post_data['args']['discountId'])) {
        $error[] = 'discountId cannot be empty';
    }
    if(empty($post_data['args']['code'])) {
        $error[] = 'code cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['token'];
    $headers['Content-Type'] = 'application/json';
    $query_str = $settings['api_url'] . 'events/'.$post_data['args']['eventId'].'/discounts/'.$post_data['args']['discountId'].'/';
    
    $body['discount.code'] = $post_data['args']['code'];
    if(!empty($post_data['args']['amountOff'])) {
        $body['discount.amount_off'] = $post_data['args']['amountOff'];
    }
    if(!empty($post_data['args']['percentOff'])) {
        $body['discount.percent_off'] = $post_data['args']['percentOff'];
    }
    if(!empty($post_data['args']['ticketIds'])) {
        $body['discount.ticket_ids'] = $post_data['args']['ticketIds'];
    }
    if(!empty($post_data['args']['quantityAvailable'])) {
        $body['discount.quantity_available'] = $post_data['args']['quantityAvailable'];
    }
    if(!empty($post_data['args']['startDate'])) {
        $body['discount.start_date'] = $post_data['args']['startDate'];
    }
    if(!empty($post_data['args']['endDate'])) {
        $body['discount.end_date'] = $post_data['args']['endDate'];
    }
    
    $client = $this->httpClient;

    try {

        $resp = $client->post( $query_str, 
            [
                'headers' => $headers,
                'json' => $body
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
