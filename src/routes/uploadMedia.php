<?php

$app->post('/api/EventbriteAPI/uploadMedia', function ($request, $response, $args) {
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
    if(empty($post_data['args']['type'])) {
        $error[] = 'type';
    }
    if(empty($post_data['args']['file'])) {
        $error[] = 'file';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }

    $query['type'] = $post_data['args']['type'];
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['token'];
    $headers['Content-Type'] = 'application/json';
    $query_str = $settings['api_url'] . 'media/upload/';
    
    $client = $this->httpClient;

    try {

        $resp = $client->get( $query_str, 
            [
                'headers' => $headers,
                'json' => $query
            ]);

        if($resp->getStatusCode() == '200') {
            //Now upload file
            $rawBody = json_decode($resp->getBody(), true);
            $upload_token = $rawBody['upload_token'];
            
            $query_str = $rawBody['upload_url'];
            
            $file = file_get_contents($post_data['args']['file']);

            $post_args = $rawBody['upload_data'];
            $post_args[$rawBody['file_parameter_name']] = $file;
            $post_args['upload_token'] = $rawBody['upload_token'];

            $multipart = array();
            foreach ($post_args as $key => $value) {
              $multipart[] = array(
                'name' => $key,
                'contents' => $value,
              );
            }

            $resp = $client->request($rawBody['upload_method'], $rawBody['upload_url'], [
                            'multipart' => $multipart,
                          ]);
            if($resp->getStatusCode() == '204') {
                //Notify about upload

                $headers['Authorization'] = "Bearer " . $post_data['args']['token'];
                $headers['Content-Type'] = 'application/json';
                $query_str = $settings['api_url'] . 'media/upload/';
                $body['upload_token'] = $upload_token;

                if(!empty($post_data['args']['cropTopLeftX'])) {
                    $body['crop_mask.top_left.x'] = $post_data['args']['cropTopLeftX'];
                }
                if(!empty($post_data['args']['cropTopLeftY'])) {
                    $body['crop_mask.top_left.y'] = $post_data['args']['cropTopLeftY'];
                }
                if(!empty($post_data['args']['cropWidth'])) {
                    $body['crop_mask.width'] = $post_data['args']['cropWidth'];
                }
                if(!empty($post_data['args']['cropHeight'])) {
                    $body['crop_mask.height'] = $post_data['args']['cropHeight'];
                }


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


            } else {
                $result['callback'] = 'error';
                $result['contextWrites']['to']['status_code'] = 'API_ERROR';
                $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            }

    
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
