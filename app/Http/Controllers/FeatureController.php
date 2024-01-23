<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiSatuSehat;
use App\Services\OAuthService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FeatureController extends Controller
{

    protected $oauthService;

    public function __construct(OAuthService $oauthService)
    {
        $this->oauthService = $oauthService;
    }


    function searchPatientByNik($identityCardNumber)
    {
        $accessToken = $this->oauthService->getAccessToken();

        // dd($accessToken);
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ];

        try {
            $response = $client->get('https://api-satusehat.kemkes.go.id/fhir-r4/v1/Patient?identifier=https://fhir.kemkes.go.id/id/nik|'.$value, [
                'headers' => $headers,
            ]);

            $responseData = json_decode($response->getBody(), true);
            return ($responseData);
            // dd($responseData);
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

    function searchPatientByName($name,$birthDate,$gender)
    {
        $accessToken = $this->oauthService->getAccessToken();

        // dd($accessToken);
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ];

        try {
            $response = $client->get('https://api-satusehat.kemkes.go.id/fhir-r4/v1/Patient?name='.$name . '&birthdate=' .$birthDate . '&gender='.$gender , [
                'headers' => $headers,
            ]);

            $responseData = json_decode($response->getBody(), true);
            echo "<pre>";
            var_dump ($responseData);
            echo "</pre>";
            // dd($responseData);
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

    function searchPatientByIHS($IHS)
    {
        $accessToken = $this->oauthService->getAccessToken();

        // dd($accessToken);
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ];

        try {
            $response = $client->get('https://api-satusehat.kemkes.go.id/fhir-r4/v1/Patient?name='.$name . '&birthdate=' .$birthDate . '&gender='.$gender , [
                'headers' => $headers,
            ]);

            $responseData = json_decode($response->getBody(), true);
            echo "<pre>";
            var_dump ($responseData);
            echo "</pre>";
            // dd($responseData);
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
