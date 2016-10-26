<?php

$app->post('/api/EventbriteAPI/updateVenue', function ($request, $response, $args) {
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
    if(empty($post_data['args']['venueId'])) {
        $error[] = 'venueId cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['token'];
    $headers['Content-Type'] = 'application/json';
    $query_str = $settings['api_url'] . 'venues/'.$post_data['args']['venueId'].'/';
    
    $body = [];
    if(!empty($post_data['args']['venueName'])) {
        $body['venue.name'] = $post_data['args']['venueName'];
    }
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
