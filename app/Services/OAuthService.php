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
                'client_id' => $credentials['client_id'],
                'client_secret' => $credentials['client_secret'],
            ]
        ];

        try {
            $response = $client->post('https://api-satusehat.kemkes.go.id/oauth2/v1/accesstoken?grant_type=client_credentials', [
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
