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
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['token'];

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
    if (!empty($post_data['args']['location'])) {
        $location = explode(',', str_replace(" ", "", $post_data['args']['location']));
        $body['location.latitude'] = $location[0];
        $body['location.longitude'] = $location[1];
    }
    else {
        if (!empty($post_data['args']['locationLatitude'])) {
            $body['location.latitude'] = $post_data['args']['locationLatitude'];
        }
        if (!empty($post_data['args']['locationLongitude'])) {
            $body['location.longitude'] = $post_data['args']['locationLongitude'];
        }
    }
    if (!empty($post_data['args']['locationViewportNortheast'])) {
        $location = explode(',', str_replace(" ", "", $post_data['args']['locationViewportNortheast']));
        $body['location.viewport.northeast.latitude'] = $location[0];
        $body['location.viewport.northeast.longitude'] = $location[1];
    }
    else {
        if (!empty($post_data['args']['locationViewportNortheastLatitude'])) {
            $body['location.viewport.northeast.latitude'] = $post_data['args']['locationViewportNortheastLatitude'];
        }
        if (!empty($post_data['args']['locationViewportNortheastLongitude'])) {
            $body['location.viewport.northeast.longitude'] = $post_data['args']['locationViewportNortheastLongitude'];
        }
    }
    if (!empty($post_data['args']['locationViewportSouthwest'])) {
        $location = explode(',', str_replace(" ", "", $post_data['args']['locationViewportSouthwest']));
        $body['location.viewport.southwest.latitude'] = $location[0];
        $body['location.viewport.southwest.longitude'] = $location[1];
    }
    else {
        if (!empty($post_data['args']['locationViewportSouthwestLatitude'])) {
            $body['location.viewport.southwest.latitude'] = $post_data['args']['locationViewportSouthwestLatitude'];
        }
        if (!empty($post_data['args']['locationViewportSouthwestLongitude'])) {
            $body['location.viewport.southwest.longitude'] = $post_data['args']['locationViewportSouthwestLongitude'];
        }
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
        if (is_array($post_data['args']['categories'])) {
            $body['categories'] = implode(',', $post_data['args']['categories']);
        }
        else {
            $body['categories'] = $post_data['args']['categories'];
        }
    }
    if(!empty($post_data['args']['subcategories'])) {
        if (is_array($post_data['args']['subcategories'])) {
            $body['subcategories'] = implode(',', $post_data['args']['subcategories']);
        }
        else {
            $body['subcategories'] = $post_data['args']['subcategories'];
        }
    }
    if(!empty($post_data['args']['formats'])) {
        if (is_array($post_data['args']['formats'])) {
            $body['formats'] = implode(',', $post_data['args']['formats']);
        }
        else {
            $body['formats'] = $post_data['args']['formats'];
        }
    }
    if(!empty($post_data['args']['price'])) {
        $body['price'] = $post_data['args']['price'];
    }
    if(!empty($post_data['args']['DateRangeStart'])) {
        $date = new DateTime($post_data['args']['DateRangeStart']);
        if ($date) {
            $body['start_date.range_start'] = $date->format('Y-m-d\TH:i:s');
        }
    }
    if(!empty($post_data['args']['DateRangeEnd'])) {
        $date = new DateTime($post_data['args']['DateRangeEnd']);
        if ($date) {
            $body['start_date.range_end'] = $date->format('Y-m-d\TH:i:s');
        }
    }
    if(!empty($post_data['args']['startDateKeyword'])) {
        $body['start_date.keyword'] = $post_data['args']['startDateKeyword'];
    }
    if(!empty($post_data['args']['ModifiedRangeStart'])) {
        $date = new DateTime($post_data['args']['ModifiedRangeStart']);
        if ($date) {
            $body['date_modified.range_start'] = $date->format('Y-m-d\TH:i:s\Z');
        }
    }
    if(!empty($post_data['args']['ModifiedRangeEnd'])) {
        $date = new DateTime($post_data['args']['ModifiedRangeEnd']);
        if ($date) {
            $body['date_modified.range_end'] = $date->format('Y-m-d\TH:i:s\Z');
        }
    }
    if(!empty($post_data['args']['ModifiedKeyword'])) {
        $body['date_modified.keyword'] = $post_data['args']['ModifiedKeyword'];
    }
    if(!empty($post_data['args']['searchType'])) {
        $body['search_type'] = $post_data['args']['searchType'];
    }
    if(isset($post_data['args']['includeAllSeriesInstances']) && is_bool($post_data['args']['includeAllSeriesInstances'])) {
        $body['include_all_series_instances'] = filter_var($post_data['args']['includeAllSeriesInstances'], FILTER_VALIDATE_BOOLEAN);
    }
    if(isset($post_data['args']['includeUnavailableEvents']) && is_bool($post_data['args']['includeUnavailableEvents'])) {
        $body['include_unavailable_events'] = filter_var($post_data['args']['includeUnavailableEvents'], FILTER_VALIDATE_BOOLEAN);
    }
    if(!empty($post_data['args']['incorporateUserAffinities'])) {
        $body['incorporate_user_affinities'] = $post_data['args']['incorporateUserAffinities'];
    }
    if(!empty($post_data['args']['highAffinityCategories'])) {
        if (is_array($post_data['args']['highAffinityCategories'])) {
            $body['high_affinity_categories'] = implode(',', $post_data['args']['highAffinityCategories']);
        }
        else {
            $body['high_affinity_categories'] = $post_data['args']['highAffinityCategories'];
        }
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
