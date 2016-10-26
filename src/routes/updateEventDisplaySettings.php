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
