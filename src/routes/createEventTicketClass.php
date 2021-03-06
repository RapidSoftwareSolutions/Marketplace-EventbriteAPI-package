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
    if(empty($post_data['args']['eventId'])) {
        $error[] = 'eventId';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
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
    if(isset($post_data['args']['donation']) && !empty($post_data['args']['donation'])) {
        $body['ticket_class.donation'] = filter_var($post_data['args']['donation'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['free']) && !empty($post_data['args']['free'])) {
        $body['ticket_class.free'] = filter_var($post_data['args']['free'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['includeFee']) && !empty($post_data['args']['includeFee'])) {
        $body['ticket_class.include_fee'] = filter_var($post_data['args']['includeFee'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['splitFee']) && !empty($post_data['args']['splitFee'])) {
        $body['ticket_class.split_fee'] = filter_var($post_data['args']['splitFee'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['hideDescription']) && !empty($post_data['args']['hideDescription'])) {
        $body['ticket_class.hide_description'] = filter_var($post_data['args']['hideDescription'], FILTER_VALIDATE_BOOLEAN);
    }
    if(!empty($post_data['args']['salesChannels'])) {
        if (is_array($post_data['args']['salesChannels'])) {
            $body['ticket_class.sales_channels'] = implode(',', $post_data['args']['salesChannels']);
        }
        else {
            $body['ticket_class.sales_channels'] = $post_data['args']['salesChannels'];
        }
    }
    if(!empty($post_data['args']['salesStart'])) {
        $date = new DateTime($post_data['args']['salesStart']);
        if ($date) {
            $body['ticket_class.sales_start'] = $date->format('Y-m-d\TH:i:s\Z');
        }
    }
    if(!empty($post_data['args']['salesEnd'])) {
        $date = new DateTime($post_data['args']['salesEnd']);
        if ($date) {
            $body['ticket_class.sales_end'] = $date->format('Y-m-d\TH:i:s\Z');
        }
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
    if(isset($post_data['args']['autoHide']) && !empty($post_data['args']['autoHide'])) {
        $body['ticket_class.auto_hide'] = filter_var($post_data['args']['autoHide'], FILTER_VALIDATE_BOOLEAN);
    }
    if(!empty($post_data['args']['autoHideBefore'])) {
        $date = new DateTime($post_data['args']['autoHideBefore']);
        if ($date) {
            $body['ticket_class.auto_hide_before'] = $date->format('Y-m-d\TH:i:s\Z');
        }
    }
    if(!empty($post_data['args']['autoHideAfter'])) {
        $date = new DateTime($post_data['args']['autoHideAfter']);
        if ($date) {
            $body['ticket_class.auto_hide_after'] = $date->format('Y-m-d\TH:i:s\Z');
        }
    }
    if(isset($post_data['args']['hidden']) && !empty($post_data['args']['hidden'])) {
        $body['ticket_class.hidden'] = filter_var($post_data['args']['hidden'], FILTER_VALIDATE_BOOLEAN);
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
