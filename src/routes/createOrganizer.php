<?php

$app->post('/api/EventbriteAPI/createOrganizer', function ($request, $response, $args) {
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
    if(empty($post_data['args']['organizerName'])) {
        $error[] = 'organizerName cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['token'];
    $headers['Content-Type'] = 'application/json';
    $query_str = $settings['api_url'] . 'organizers/';
    
    $body['organizer.name'] = $post_data['args']['organizerName'];
    if(!empty($post_data['args']['organizerDescription'])) {
        $body['organizer.description.html'] = $post_data['args']['organizerDescription'];
    }
    if(!empty($post_data['args']['organizerLongDescription'])) {
        $body['organizer.long_description.html'] = $post_data['args']['organizerLongDescription'];
    }
    if(!empty($post_data['args']['organizerLogoId'])) {
        $body['organizer.logo.id'] = $post_data['args']['organizerLogoId'];
    }
    if(!empty($post_data['args']['organizerWebsite'])) {
        $body['organizer.website'] = $post_data['args']['organizerWebsite'];
    }
    if(!empty($post_data['args']['organizerTwitter'])) {
        $body['organizer.twitter'] = $post_data['args']['organizerTwitter'];
    }
    if(!empty($post_data['args']['organizerFacebook'])) {
        $body['organizer.facebook'] = $post_data['args']['organizerFacebook'];
    }
    if(!empty($post_data['args']['organizerInstagram'])) {
        $body['organizer.instagram'] = $post_data['args']['organizerInstagram'];
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
