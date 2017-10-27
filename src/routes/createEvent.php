<?php

$app->post('/api/EventbriteAPI/createEvent', function ($request, $response, $args) {
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
    if(empty($post_data['args']['eventName'])) {
        $error[] = 'eventName';
    }
    if(empty($post_data['args']['eventStartUtc'])) {
        $error[] = 'eventStartUtc';
    }
    if(empty($post_data['args']['eventStartTimezone'])) {
        $error[] = 'eventStartTimezone';
    }
    if(empty($post_data['args']['eventEndUtc'])) {
        $error[] = 'eventEndUtc';
    }
    if(empty($post_data['args']['eventEndTimezone'])) {
        $error[] = 'eventEndTimezone';
    }
    if(empty($post_data['args']['eventCurrency'])) {
        $error[] = 'eventCurrency';
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
    $query_str = $settings['api_url'] . 'events/';
    
    $body['event.name.html'] = $post_data['args']['eventName'];
    $startUTC = new DateTime($post_data['args']['eventStartUtc']);
    $body['event.start.utc'] = $startUTC->format('Y-m-d\TH:i:s\Z');
    $body['event.start.timezone'] = $post_data['args']['eventStartTimezone'];
    $endUTC = new DateTime($post_data['args']['eventEndUtc']);
    $body['event.end.utc'] = $endUTC->format('Y-m-d\TH:i:s\Z');
    $body['event.end.timezone'] = $post_data['args']['eventEndTimezone'];
    $body['event.currency'] = $post_data['args']['eventCurrency'];
    
    
    if(!empty($post_data['args']['eventDescription'])) {
        $body['event.description.html'] = $post_data['args']['eventDescription'];
    }
    if(!empty($post_data['args']['eventOrganizerId'])) {
        $body['event.organizer_id'] = $post_data['args']['eventOrganizerId'];
    }
    if(isset($post_data['args']['eventHideStartDate']) && !empty($post_data['args']['eventHideStartDate'])) {
        $body['event.hide_start_date'] = filter_var($post_data['args']['eventHideStartDate'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['eventHideEndDate']) && !empty($post_data['args']['eventHideEndDate'])) {
        $body['event.hide_end_date'] = filter_var($post_data['args']['eventHideEndDate'], FILTER_VALIDATE_BOOLEAN);
    }
    if(!empty($post_data['args']['eventVenueId'])) {
        $body['event.venue_id'] = $post_data['args']['eventVenueId'];
    }
    if(isset($post_data['args']['eventOnlineEvent']) && !empty($post_data['args']['eventOnlineEvent'])) {
        $body['event.online_event'] =filter_var($post_data['args']['eventOnlineEvent'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['eventListed']) && !empty($post_data['args']['eventListed'])) {
        $body['event.listed'] = filter_var($post_data['args']['eventListed'], FILTER_VALIDATE_BOOLEAN);
    }
    if(!empty($post_data['args']['eventLogoId'])) {
        $body['event.logo_id'] = $post_data['args']['eventLogoId'];
    }
    if(!empty($post_data['args']['eventCategoryId'])) {
        $body['event.category_id'] = $post_data['args']['eventCategoryId'];
    }
    if(!empty($post_data['args']['eventSubcategoryId'])) {
        $body['event.subcategory_id'] = $post_data['args']['eventSubcategoryId'];
    }
    if(!empty($post_data['args']['eventFormatId'])) {
        $body['event.format_id'] = $post_data['args']['eventFormatId'];
    }
    if(isset($post_data['eventShareable']) && !empty($post_data['args']['eventShareable'])) {
        $body['event.shareable'] = filter_var($post_data['args']['eventShareable'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['eventInviteOnly']) && !empty($post_data['args']['eventInviteOnly'])) {
        $body['event.invite_only'] = filter_var($post_data['args']['eventInviteOnly'], FILTER_VALIDATE_BOOLEAN);
    }
    if(!empty($post_data['args']['eventPassword'])) {
        $body['event.password'] = $post_data['args']['eventPassword'];
    }
    if(!empty($post_data['args']['eventCapacity'])) {
        $body['event.capacity'] = $post_data['args']['eventCapacity'];
    }
    if(isset($post_data['args']['eventShowRemaining']) && !empty($post_data['args']['eventShowRemaining'])) {
        $body['event.show_remaining'] = filter_var($post_data['args']['eventShowRemaining'], FILTER_VALIDATE_BOOLEAN);
    }
    if(!empty($post_data['args']['eventSource'])) {
        $body['event.source'] = $post_data['args']['eventSource'];
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
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody, true);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
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
