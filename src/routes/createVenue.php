<?php

$app->post('/api/EventbriteAPI/createVenue', function ($request, $response, $args) {
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
    if(empty($post_data['args']['venueName'])) {
        $error[] = 'venueName';
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
    $query_str = $settings['api_url'] . 'venues/';
    
    $body['venue.name'] = $post_data['args']['venueName'];
    if(!empty($post_data['args']['venueAddressLatitude'])) {
        $body['venue.address.latitude'] = $post_data['args']['venueAddressLatitude'];
    }
    if(!empty($post_data['args']['venueAddressLongitude'])) {
        $body['venue.address.longitude'] = $post_data['args']['venueAddressLongitude'];
    }
    if(!empty($post_data['args']['venueOrganizerId'])) {
        $body['venue.organizer_id'] = $post_data['args']['venueOrganizerId'];
    }
    if(!empty($post_data['args']['venueAddress1'])) {
        $body['venue.address.address_1'] = $post_data['args']['venueAddress1'];
    }
    if(!empty($post_data['args']['venueAddress2'])) {
        $body['venue.address.address_2'] = $post_data['args']['venueAddress2'];
    }
    if(!empty($post_data['args']['venueRegion'])) {
        $body['venue.address.city'] = $post_data['args']['venueRegion'];
    }
    if(!empty($post_data['args']['venueCity'])) {
        $body['venue.address.region'] = $post_data['args']['venueCity'];
    }
    if(!empty($post_data['args']['venuePostalCode'])) {
        $body['venue.address.postal_code'] = $post_data['args']['venuePostalCode'];
    }
    if(!empty($post_data['args']['venueCountry'])) {
        $body['venue.address.country'] = $post_data['args']['venueCountry'];
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
