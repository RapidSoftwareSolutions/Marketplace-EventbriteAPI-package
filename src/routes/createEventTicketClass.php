<?php

$app->post('/api/EventbriteAPI/createEventTicketClass', function ($request, $response, $args) {
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
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['token'];
    $headers['Content-Type'] = 'application/json';
    $query_str = $settings['api_url'] . 'events/'.$post_data['args']['eventId'].'/ticket_classes/';
    
    $body = [];
    if(!empty($post_data['args']['name'])) {
        $body['ticket_class.name'] = $post_data['args']['name'];
    }
    if(!empty($post_data['args']['description'])) {
        $body['ticket_class.description'] = $post_data['args']['description'];
    }
    if(!empty($post_data['args']['quantityTotal'])) {
        $body['ticket_class.quantity_total'] = $post_data['args']['quantityTotal'];
    }
    if(!empty($post_data['args']['cost'])) {
        $body['ticket_class.cost'] = $post_data['args']['cost'];
    }
    if(!empty($post_data['args']['donation'])) {
        $body['ticket_class.donation'] = $post_data['args']['donation'];
    }
    if(!empty($post_data['args']['free'])) {
        $body['ticket_class.free'] = $post_data['args']['free'];
    }
    if(!empty($post_data['args']['includeFee'])) {
        $body['ticket_class.include_fee'] = $post_data['args']['includeFee'];
    }
    if(!empty($post_data['args']['splitFee'])) {
        $body['ticket_class.split_fee'] = $post_data['args']['splitFee'];
    }
    if(!empty($post_data['args']['hideDescription'])) {
        $body['ticket_class.hide_description'] = $post_data['args']['hideDescription'];
    }
    if(!empty($post_data['args']['salesChannels'])) {
        $body['ticket_class.sales_channels'] = $post_data['args']['salesChannels'];
    }
    if(!empty($post_data['args']['salesStart'])) {
        $body['ticket_class.sales_start'] = $post_data['args']['salesStart'];
    }
    if(!empty($post_data['args']['salesEnd'])) {
        $body['ticket_class.sales_end'] = $post_data['args']['salesEnd'];
    }
    if(!empty($post_data['args']['salesStartAfter'])) {
        $body['ticket_class.sales_start_after'] = $post_data['args']['salesStartAfter'];
    }
    if(!empty($post_data['args']['minimumQuantity'])) {
        $body['ticket_class.minimum_quantity'] = $post_data['args']['minimumQuantity'];
    }
    if(!empty($post_data['args']['maximumQuantity'])) {
        $body['ticket_class.maximum_quantity'] = $post_data['args']['maximumQuantity'];
    }
    if(!empty($post_data['args']['autoHide'])) {
        $body['ticket_class.auto_hide'] = $post_data['args']['autoHide'];
    }
    if(!empty($post_data['args']['autoHideBefore'])) {
        $body['ticket_class.auto_hide_before'] = $post_data['args']['autoHideBefore'];
    }
    if(!empty($post_data['args']['autoHideAfter'])) {
        $body['ticket_class.auto_hide_after'] = $post_data['args']['autoHideAfter'];
    }
    if(!empty($post_data['args']['hidden'])) {
        $body['ticket_class.hidden'] = $post_data['args']['hidden'];
    }
    if(!empty($post_data['args']['orderConfirmationMessage'])) {
        $body['ticket_class.order_confirmation_message'] = $post_data['args']['orderConfirmationMessage'];
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
