<?php

$app->post('/api/EventbriteAPI/createEventSeries', function ($request, $response, $args) {
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
    if(empty($post_data['args']['seriesParentName'])) {
        $error[] = 'seriesParentName cannot be empty';
    }
    if(empty($post_data['args']['seriesParentStartUtc'])) {
        $error[] = 'seriesParentStartUtc cannot be empty';
    }
    if(empty($post_data['args']['seriesParentStartTimezone'])) {
        $error[] = 'seriesParentStartTimezone cannot be empty';
    }
    if(empty($post_data['args']['seriesParentEndUtc'])) {
        $error[] = 'seriesParentEndUtc cannot be empty';
    }
    if(empty($post_data['args']['seriesParentEndTimezone'])) {
        $error[] = 'seriesParentEndTimezone cannot be empty';
    }
    if(empty($post_data['args']['seriesParentCurrency'])) {
        $error[] = 'seriesParentCurrency cannot be empty';
    }
    if(empty($post_data['args']['createChildren'])) {
        $error[] = 'createChildren cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['token'];
    $headers['Content-Type'] = 'application/json';
    $query_str = $settings['api_url'] . 'series/';
    
    $body['series_parent.name.html'] = $post_data['args']['seriesParentName'];
    $body['series_parent.start.utc'] = $post_data['args']['seriesParentStartUtc'];
    $body['series_parent.start.timezone'] = $post_data['args']['seriesParentStartTimezone'];
    $body['series_parent.end.utc'] = $post_data['args']['seriesParentEndUtc'];
    $body['series_parent.end.timezone'] = $post_data['args']['seriesParentEndTimezone'];
    $body['series_parent.currency'] = $post_data['args']['seriesParentCurrency'];
    $body['create_children'] = $post_data['args']['createChildren'];
    if(!empty($post_data['args']['seriesParentDescription'])) {
        $body['series_parent.description.html'] = $post_data['args']['seriesParentDescription'];
    }
    if(!empty($post_data['args']['seriesParentOrganizerId'])) {
        $body['series_parent.organizer_id'] = $post_data['args']['seriesParentOrganizerId'];
    }
    if(!empty($post_data['args']['seriesParentHideStartDate'])) {
        $body['series_parent.hide_start_date'] = $post_data['args']['seriesParentHideStartDate'];
    }
    if(!empty($post_data['args']['seriesParentHideEndDate'])) {
        $body['series_parent.hide_end_date'] = $post_data['args']['seriesParentHideEndDate'];
    }
    if(!empty($post_data['args']['seriesParentVenueId'])) {
        $body['series_parent.venue_id'] = $post_data['args']['seriesParentVenueId'];
    }
    if(!empty($post_data['args']['seriesParentOnlineEvent'])) {
        $body['series_parent.online_event'] = $post_data['args']['seriesParentOnlineEvent'];
    }
    if(!empty($post_data['args']['seriesParentListed'])) {
        $body['series_parent.listed'] = $post_data['args']['seriesParentListed'];
    }
    if(!empty($post_data['args']['seriesParentLogoId'])) {
        $body['series_parent.listed'] = $post_data['args']['seriesParentLogoId'];
    }
    if(!empty($post_data['args']['seriesParentCategoryId'])) {
        $body['series_parent.category_id'] = $post_data['args']['seriesParentCategoryId'];
    }
    if(!empty($post_data['args']['seriesParentSubcategoryId'])) {
        $body['series_parent.subcategory_id'] = $post_data['args']['seriesParentSubcategoryId'];
    }
    if(!empty($post_data['args']['seriesParentFormatId'])) {
        $body['series_parent.format_id'] = $post_data['args']['seriesParentFormatId'];
    }
    if(!empty($post_data['args']['seriesParentShareable'])) {
        $body['series_parent.shareable'] = $post_data['args']['seriesParentShareable'];
    }
    if(!empty($post_data['args']['seriesParentInviteOnly'])) {
        $body['series_parent.invite_only'] = $post_data['args']['seriesParentInviteOnly'];
    }
    if(!empty($post_data['args']['seriesParentPassword'])) {
        $body['series_parent.password'] = $post_data['args']['seriesParentPassword'];
    }
    if(!empty($post_data['args']['seriesParentCapacity'])) {
        $body['series_parent.capacity'] = $post_data['args']['seriesParentCapacity'];
    }
    if(!empty($post_data['args']['seriesParentShowRemaining'])) {
        $body['series_parent.show_remaining'] = $post_data['args']['seriesParentShowRemaining'];
    }
    if(!empty($post_data['args']['updateChildren'])) {
        $body['update_children'] = $post_data['args']['updateChildren'];
    }
    if(!empty($post_data['args']['deleteChildren'])) {
        $body['delete_children'] = $post_data['args']['deleteChildren'];
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
