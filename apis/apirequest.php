<?php

require_once '../config.php';
require_once CLASSES_DIR . 'loader.php';
require_once VENDOR_DIR . 'autoload.php';

$url = isset($_REQUEST['url']) && !empty($_REQUEST['url']) ? trim($_REQUEST['url']) : '';
$getParams = isset($_REQUEST['params']) && !empty($_REQUEST['params']) ? json_decode($_REQUEST['params'], true) : '';
$options = isset($_REQUEST['options']) && !empty($_REQUEST['options']) ? json_decode($_REQUEST['options'], true) : array();
$output = array();
$output['status'] = 'error';

if (!empty($_REQUEST['recaptcha'])) {
// validate recaptcha here
    $response = $_REQUEST['recaptcha'];
    $post = http_build_query(
        array(
            'response' => $response,
            'secret' => RECAPTCHA_SECRET,
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        )
    );
    $opts = array('http' => array(
        'method' => 'POST',
        'header' => 'application/x-www-form-urlencoded',
        'content' => $post,
    ),
    );
    $context = stream_context_create($opts);
    //$serverResponse = @file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
    if(function_exists('curl_init') && function_exists('curl_setopt') && function_exists('curl_exec')) {
		// Use cURL to get data 10x faster than using file_get_contents or other methods
		$ch =  curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
			curl_setopt($ch, CURLOPT_TIMEOUT, 50);
            curl_setopt($ch, CURLOPT_ENCODING, "gzip");
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-type: application/x-www-form-urlencoded'));
			$response = curl_exec($ch);
		curl_close($ch);
    }

    if (!$response) {
        $output['response'] = 'Failed to validate Recaptcha';
    }
    $result = json_decode($response);
    if ($result->success) {
        if (!empty($url)) {
            if (is_array($options)) {
                /* START OPTIONS */
                $options['verify'] = false;
                if (is_array($getParams) && count($getParams) > 0) {
                    $options['query'] = $getParams;
                }
                if (isset($options['post_data']) && !empty($options['post_data'])) {
                    if (isset($options['body_type']) && $options['body_type'] == 'json') {
                        //empty query feature for custom object cloud api
                        if (array_key_exists("q", $options['post_data'])) {
                            if (sizeof($options['post_data']["q"]) == 0) {
                                $options['post_data']["q"] = new stdClass();
                            }
                        }
                        $options['body'] = json_encode($options['post_data']);
                    } elseif (isset($options['body_type']) && $options['body_type'] != 'json') {
                        $options['body'] = http_build_query($options['post_data']);
                    }
                }
                $method = isset($options['method']) && !empty($options['method']) ? trim($options['method']) : 'GET';
                unset($options['method']);
                unset($options['post_data']);
                unset($options['body_type']);
                /* END OPTIONS */
                try {
                    $client = new \GuzzleHttp\Client();
                    $response = $client->request($method, $url, $options);
                    $output['status'] = 'success';
                    $output['response']['response_status_code'] = $response->getStatusCode();
                    $output['response']['request_header'] = '';
                    foreach ($response->getHeaders() as $name => $values) {
                        $output['response']['request_header'] .= $name . ': ' . implode(', ', $values) . "\r\n";
                    }
                    $output['response']['response_content'] = (string) $response->getBody();
                } catch (GuzzleHttp\Exception\RequestException $e) {
                    $response = $e->getResponse();
                    $output['response']['response_status_code'] = $response->getStatusCode();
                    $output['response']['request_header'] = '';
                    foreach ($response->getHeaders() as $name => $values) {
                        $output['response']['request_header'] .= $name . ': ' . implode(', ', $values) . "\r\n";
                    }
                    $output['response']['response_content'] = (string) $response->getBody();
                } catch (Exception $e) {
                    $output['response'] = $e->getMessage();
                }
            } else {
                $output['response'] = "Please fill correct body parameters";
            }
        } else {
            $output['response'] = 'URL is required fields.';
        }
    } else {
        $output['response'] = $result;
    }
} else {
    $output['response'] = 'Please fill The Captcha';
}

echo json_encode($output);
