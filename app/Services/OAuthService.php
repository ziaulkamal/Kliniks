<?php


// app/Services/OAuthService.php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class OAuthService
{
    public function getAccessToken()
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        $credentials = config('app.access_credentials');

        $options = [
            'form_params' => [
                'client_id' => env('SATUSEHAT_CLIENT_ID'),
                'client_secret' => env('SATUSEHAT_CLIENT_SECRET'),
            ]
        ];

        try {
            $response = $client->post(env('AUTH_URL').'/oauth2/v1/accesstoken?grant_type=client_credentials', [
                'headers' => $headers,
                'form_params' => $options['form_params']
            ]);

            $responseData = json_decode($response->getBody(), true);

            if (isset($responseData['access_token'])) {
                return $responseData['access_token'];
                // return $responseData;
            } else {
                return 'Access token not found in response';
            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                return $e->getResponse()->getBody();
            } else {
                return $e->getMessage();
            }
        }
    }
}
