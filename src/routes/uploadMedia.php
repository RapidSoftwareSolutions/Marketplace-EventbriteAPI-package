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
    
    $error = [];
    if(empty($post_data['args']['token'])) {
        $error[] = 'token cannot be empty';
    }
    if(empty($post_data['args']['type'])) {
        $error[] = 'type cannot be empty';
    }
    if(empty($post_data['args']['file'])) {
        $error[] = 'file cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
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
                    $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
                }


            } else {
                $result['callback'] = 'error';
                $result['contextWrites']['to'] = $responseBody;
            }

    
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to'] = $responseBody;
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
