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
    if(empty($post_data['args']['terminology'])) {
        $error[] = 'terminology';
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
    if(isset($post_data['args']['showStartDate']) && !empty($post_data['args']['showStartDate'])) {
        $body['display_settings.show_start_date'] = filter_var($post_data['args']['showStartDate'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['showEndDate']) && !empty($post_data['args']['showEndDate'])) {
        $body['display_settings.show_end_date'] = filter_var($post_data['args']['showEndDate'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['showStartEndTime']) && !empty($post_data['args']['showStartEndTime'])) {
        $body['display_settings.show_start_end_time'] = filter_var($post_data['args']['showStartEndTime'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['showTimezone']) && !empty($post_data['args']['showTimezone'])) {
        $body['display_settings.show_timezone'] = filter_var($post_data['args']['showTimezone'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['showMap']) && !empty($post_data['args']['showMap'])) {
        $body['display_settings.show_map'] = filter_var($post_data['args']['showMap'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['showRemaining']) && !empty($post_data['args']['showRemaining'])) {
        $body['display_settings.show_remaining'] = filter_var($post_data['args']['showRemaining'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['showOrganizerFacebook']) && !empty($post_data['args']['showOrganizerFacebook'])) {
        $body['display_settings.show_organizer_facebook'] = filter_var($post_data['args']['showOrganizerFacebook'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['showOrganizerTwitter']) && !empty($post_data['args']['showOrganizerTwitter'])) {
        $body['display_settings.show_organizer_twitter'] = filter_var($post_data['args']['showOrganizerTwitter'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['showFacebookFriendsGoing']) && !empty($post_data['args']['showFacebookFriendsGoing'])) {
        $body['display_settings.show_facebook_friends_going'] = filter_var($post_data['args']['showFacebookFriendsGoing'], FILTER_VALIDATE_BOOLEAN);
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
