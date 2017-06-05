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
    if(empty($post_data['args']['seriesParentName'])) {
        $error[] = 'seriesParentName';
    }
    if(empty($post_data['args']['seriesParentStartUtc'])) {
        $error[] = 'seriesParentStartUtc';
    }
    if(empty($post_data['args']['seriesParentStartTimezone'])) {
        $error[] = 'seriesParentStartTimezone';
    }
    if(empty($post_data['args']['seriesParentEndUtc'])) {
        $error[] = 'seriesParentEndUtc';
    }
    if(empty($post_data['args']['seriesParentEndTimezone'])) {
        $error[] = 'seriesParentEndTimezone';
    }
    if(empty($post_data['args']['seriesParentCurrency'])) {
        $error[] = 'seriesParentCurrency';
    }
    if(empty($post_data['args']['createChildren'])) {
        $error[] = 'createChildren';
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
    $query_str = $settings['api_url'] . 'series/';
    
    $body['series_parent.name.html'] = $post_data['args']['seriesParentName'];
    $startUTC = new DateTime($post_data['args']['seriesParentStartUtc']);
    $endUTC = new DateTime($post_data['args']['seriesParentEndUtc']);
    if ($startUTC) {
        $body['series_parent.start.utc'] = $startUTC->format('Y-m-d\TH:i:s\Z');
    }
    if ($endUTC) {
        $body['series_parent.end.utc'] = $endUTC->format('Y-m-d\TH:i:s\Z');
    }

    $body['series_parent.start.timezone'] = $post_data['args']['seriesParentStartTimezone'];
    $body['series_parent.end.timezone'] = $post_data['args']['seriesParentEndTimezone'];
    $body['series_parent.currency'] = $post_data['args']['seriesParentCurrency'];
    $body['create_children'] = $post_data['args']['createChildren'];
    if(!empty($post_data['args']['seriesParentDescription'])) {
        $body['series_parent.description.html'] = $post_data['args']['seriesParentDescription'];
    }
    if(!empty($post_data['args']['seriesParentOrganizerId'])) {
        $body['series_parent.organizer_id'] = $post_data['args']['seriesParentOrganizerId'];
    }
    if(is_bool($post_data['args']['seriesParentHideStartDate'])) {
        $body['series_parent.hide_start_date'] = filter_var($post_data['args']['seriesParentHideStartDate'], FILTER_VALIDATE_BOOLEAN);
    }
    if(is_bool($post_data['args']['seriesParentHideEndDate'])) {
        $body['series_parent.hide_end_date'] = filter_var($post_data['args']['seriesParentHideEndDate'], FILTER_VALIDATE_BOOLEAN);
    }
    if(!empty($post_data['args']['seriesParentVenueId'])) {
        $body['series_parent.venue_id'] = $post_data['args']['seriesParentVenueId'];
    }
    if(is_bool($post_data['args']['seriesParentOnlineEvent'])) {
        $body['series_parent.online_event'] = filter_var($post_data['args']['seriesParentOnlineEvent'], FILTER_VALIDATE_BOOLEAN);
    }
    if(is_bool($post_data['args']['seriesParentListed'])) {
        $body['series_parent.listed'] = filter_var($post_data['args']['seriesParentListed'], FILTER_VALIDATE_BOOLEAN);
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
        if (is_array($post_data['args']['deleteChildren'])) {
            $body['delete_children'] = implode(',', $post_data['args']['deleteChildren']);
        }
        else {
            $body['delete_children'] = $post_data['args']['deleteChildren'];
        }
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
