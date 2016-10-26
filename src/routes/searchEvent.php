<?php

$app->post('/api/EventbriteAPI/searchEvent', function ($request, $response, $args) {
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
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['token'];
    //$headers['Content-Type'] = 'application/json';
    $query_str = $settings['api_url'] . 'events/search/';
    
    $body = [];
    if(!empty($post_data['args']['q'])) {
        $body['q'] = $post_data['args']['q'];
    }
    if(!empty($post_data['args']['sortBy'])) {
        $body['sort_by'] = $post_data['args']['sortBy'];
    }
    if(!empty($post_data['args']['locationAddress'])) {
        $body['location.address'] = $post_data['args']['locationAddress'];
    }
    if(!empty($post_data['args']['locationWithin'])) {
        $body['location.within'] = $post_data['args']['locationWithin'];
    }
    if(!empty($post_data['args']['locationLatitude'])) {
        $body['location.latitude'] = $post_data['args']['locationLatitude'];
    }
    if(!empty($post_data['args']['locationLongitude'])) {
        $body['location.longitude'] = $post_data['args']['locationLongitude'];
    }
    if(!empty($post_data['args']['locationViewportNortheastLatitude'])) {
        $body['location.viewport.northeast.latitude'] = $post_data['args']['locationViewportNortheastLatitude'];
    }
    if(!empty($post_data['args']['locationViewportNortheastLongitude'])) {
        $body['location.viewport.northeast.longitude'] = $post_data['args']['locationViewportNortheastLongitude'];
    }
    if(!empty($post_data['args']['locationViewportSouthwestLatitude'])) {
        $body['location.viewport.southwest.latitude'] = $post_data['args']['locationViewportSouthwestLatitude'];
    }
    if(!empty($post_data['args']['locationViewportSouthwestLongitude'])) {
        $body['location.viewport.southwest.longitude'] = $post_data['args']['locationViewportSouthwestLongitude'];
    }
    if(!empty($post_data['args']['organizerId'])) {
        $body['organizer.id'] = $post_data['args']['organizerId'];
    }
    if(!empty($post_data['args']['userId'])) {
        $body['user.id'] = $post_data['args']['userId'];
    }
    if(!empty($post_data['args']['trackingCode'])) {
        $body['tracking_code'] = $post_data['args']['trackingCode'];
    }
    if(!empty($post_data['args']['categories'])) {
        $body['categories'] = $post_data['args']['categories'];
    }
    if(!empty($post_data['args']['subcategories'])) {
        $body['subcategories'] = $post_data['args']['subcategories'];
    }
    if(!empty($post_data['args']['formats'])) {
        $body['formats'] = $post_data['args']['formats'];
    }
    if(!empty($post_data['args']['price'])) {
        $body['price'] = $post_data['args']['price'];
    }
    if(!empty($post_data['args']['DateRangeStart'])) {
        $body['start_date.range_start'] = $post_data['args']['DateRangeStart'];
    }
    if(!empty($post_data['args']['DateRangeEnd'])) {
        $body['start_date.range_end'] = $post_data['args']['DateRangeEnd'];
    }
    if(!empty($post_data['args']['startDateKeyword'])) {
        $body['start_date.keyword'] = $post_data['args']['startDateKeyword'];
    }
    if(!empty($post_data['args']['ModifiedRangeStart'])) {
        $body['date_modified.range_start'] = $post_data['args']['ModifiedRangeStart'];
    }
    if(!empty($post_data['args']['ModifiedRangeEnd'])) {
        $body['date_modified.range_end'] = $post_data['args']['ModifiedRangeEnd'];
    }
    if(!empty($post_data['args']['ModifiedKeyword'])) {
        $body['date_modified.keyword'] = $post_data['args']['ModifiedKeyword'];
    }
    if(!empty($post_data['args']['searchType'])) {
        $body['search_type'] = $post_data['args']['searchType'];
    }
    if(!empty($post_data['args']['includeAllSeriesInstances'])) {
        $body['include_all_series_instances'] = $post_data['args']['includeAllSeriesInstances'];
    }
    if(!empty($post_data['args']['includeUnavailableEvents'])) {
        $body['include_unavailable_events'] = $post_data['args']['includeUnavailableEvents'];
    }
    if(!empty($post_data['args']['incorporateUserAffinities'])) {
        $body['incorporate_user_affinities'] = $post_data['args']['incorporateUserAffinities'];
    }
    if(!empty($post_data['args']['highAffinityCategories'])) {
        $body['high_affinity_categories'] = $post_data['args']['highAffinityCategories'];
    }

    $client = $this->httpClient;

    try {

        $resp = $client->get( $query_str, 
            [
                'headers' => $headers,
                'query' => $body
            ]);
        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());
        
        $all_data[] = $rawBody;
        
        if($rawBody->pagination->page_count != 1) {
            $pagin = $this->pager;
            $ret = $pagin->page($query_str, 2, $headers, 'events');
            
            $merge = array_merge($all_data[0]->events, $ret);
        
            $all_data[0]->events = $merge;
        }
        
        if($resp->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
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
