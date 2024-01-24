<?php

namespace App\Http\Controllers;

use App\Services\OAuthService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiSatuSehat extends Controller
{
    protected $oauthService;

    public function __construct(OAuthService $oauthService)
    {
        $this->oauthService = $oauthService;
    }


    function cekToken() {
        $accessToken = $this->oauthService->getAccessToken();

        return $accessToken;
        // dd($accessToken);
    }
    function tokenPatient($value)
    {
        $getToken = $this->oauthService->getAccessToken();
        $accessToken = $getToken['access_token'];

        // dd($accessToken);
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ];

        try {
            $dev = 'https://api-satusehat-dev.dto.kemkes.go.id/fhir-r4/v1';
            $prod = 'https://api-satusehat.kemkes.go.id/fhir-r4/v1';

            $response = $client->get($dev.'/Patient?identifier=https://fhir.kemkes.go.id/id/nik|'.$value, [
                'headers' => $headers,
            ]);

            $responseData = json_decode($response->getBody(), true);
            // return ($responseData['entry'][0]['resource']);
            dd($responseData);
            // return $responseData['entry'][0]['resource']['id'];
        } catch (RequestException $e) {
            // Handle request exception if needed
            if ($e->hasResponse()) {
                return $e->getResponse()->getBody();
            } else {
                return $e->getMessage();
            }
        }


    }




}
