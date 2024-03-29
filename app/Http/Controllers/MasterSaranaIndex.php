<?php

namespace App\Http\Controllers;

use App\Services\OAuthService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MasterSaranaIndex extends Controller
{
    protected $oauthService;
    protected $baseUrl;

    public function __construct(OAuthService $oauthService)
    {
        $this->oauthService = $oauthService;
        $this->baseUrl = env('SATUSEHAT_MSI_URL'); // Get from Laravel config
    }

    protected function clientProses($proses) {
        try {
            $client = new Client();
            $response = $client->get($this->baseUrl . '/' . $proses, [
                'headers' => $this->getHeaders(),
            ]);

            return response()->json(json_decode($response->getBody()->getContents(), true), 200);
        } catch (RequestException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    protected function getHeaders()
    {
        $accessToken = $this->oauthService->getAccessToken();
        return [
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ];
    }

    function index() {
        $proses = 'v1/mastersaranaindex/mastersarana';
        $response =  $this->clientProses($proses);
        return $response;
    }
}
