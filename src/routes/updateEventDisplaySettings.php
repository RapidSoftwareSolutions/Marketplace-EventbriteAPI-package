<?php

$app->post('/api/EventbriteAPI/updateEventDisplaySettings', function ($request, $response, $args) {
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
    $query_str = $settings['api_url'] . 'events/'.$post_data['args']['eventId'].'/display_settings/';
    
    $body = [];
    if(!empty($post_data['args']['showStartDate'])) {
        $body['display_settings.show_start_date'] = $post_data['args']['showStartDate'];
    }
    if(!empty($post_data['args']['showEndDate'])) {
        $body['display_settings.show_end_date'] = $post_data['args']['showEndDate'];
    }
    if(!empty($post_data['args']['showStartEndTime'])) {
        $body['display_settings.show_start_end_time'] = $post_data['args']['showStartEndTime'];
    }
    if(!empty($post_data['args']['showTimezone'])) {
        $body['display_settings.show_timezone'] = $post_data['args']['showTimezone'];
    }
    if(!empty($post_data['args']['showMap'])) {
        $body['display_settings.show_map'] = $post_data['args']['showMap'];
    }
    if(!empty($post_data['args']['showRemaining'])) {
        $body['display_settings.show_remaining'] = $post_data['args']['showRemaining'];
    }
    if(!empty($post_data['args']['showOrganizerFacebook'])) {
        $body['display_settings.show_organizer_facebook'] = $post_data['args']['showOrganizerFacebook'];
    }
    if(!empty($post_data['args']['showOrganizerTwitter'])) {
        $body['display_settings.show_organizer_twitter'] = $post_data['args']['showOrganizerTwitter'];
    }
    if(!empty($post_data['args']['showFacebookFriendsGoing'])) {
        $body['display_settings.show_facebook_friends_going'] = $post_data['args']['showFacebookFriendsGoing'];
    }
    if(!empty($post_data['args']['terminology'])) {
        $body['display_settings.terminology'] = $post_data['args']['terminology'];
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
