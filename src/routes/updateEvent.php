<?php

$app->post('/api/EventbriteAPI/updateEvent', function ($request, $response, $args) {
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
    $query_str = $settings['api_url'] . 'events/'.$post_data['args']['eventId'].'/';
    
    
    $body = [];
    if(!empty($post_data['args']['eventName'])) {
        $body['event.name.html'] = $post_data['args']['eventName'];
    }
    if(!empty($post_data['args']['eventStartUtc'])) {
        $body['event.start.utc'] = $post_data['args']['eventStartUtc'];
    }
    if(!empty($post_data['args']['eventStartTimezone'])) {
        $body['event.start.timezone'] = $post_data['args']['eventStartTimezone'];
    }
    if(!empty($post_data['args']['eventEndUtc'])) {
        $body['event.end.utc'] = $post_data['args']['eventEndUtc'];
    }
    if(!empty($post_data['args']['eventEndTimezone'])) {
        $body['event.end.timezone'] = $post_data['args']['eventEndTimezone'];
    }
    if(!empty($post_data['args']['eventCurrency'])) {
        $body['event.currency'] = $post_data['args']['eventCurrency'];
    }
    if(!empty($post_data['args']['eventDescription'])) {
        $body['event.description.html'] = $post_data['args']['eventDescription'];
    }
    if(!empty($post_data['args']['eventOrganizerId'])) {
        $body['event.organizer_id'] = $post_data['args']['eventOrganizerId'];
    }
    if(!empty($post_data['args']['eventHideStartDate'])) {
        $body['event.hide_start_date'] = $post_data['args']['eventHideStartDate'];
    }
    if(!empty($post_data['args']['eventHideEndDate'])) {
        $body['event.hide_end_date'] = $post_data['args']['eventHideEndDate'];
    }
    if(!empty($post_data['args']['eventVenueId'])) {
        $body['event.venue_id'] = $post_data['args']['eventVenueId'];
    }
    if(!empty($post_data['args']['eventOnlineEvent'])) {
        $body['event.online_event'] = $post_data['args']['eventOnlineEvent'];
    }
    if(!empty($post_data['args']['eventListed'])) {
        $body['event.listed'] = $post_data['args']['eventListed'];
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
    if(!empty($post_data['args']['eventShareable'])) {
        $body['event.shareable'] = $post_data['args']['eventShareable'];
    }
    if(!empty($post_data['args']['eventInviteOnly'])) {
        $body['event.invite_only'] = $post_data['args']['eventInviteOnly'];
    }
    if(!empty($post_data['args']['eventPassword'])) {
        $body['event.password'] = $post_data['args']['eventPassword'];
    }
    if(!empty($post_data['args']['eventCapacity'])) {
        $body['event.capacity'] = $post_data['args']['eventCapacity'];
    }
    if(!empty($post_data['args']['eventShowRemaining'])) {
        $body['event.show_remaining'] = $post_data['args']['eventShowRemaining'];
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
