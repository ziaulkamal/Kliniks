<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiSatuSehat;
use App\Services\OAuthService;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GetRequest;
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
            $response = $client->get('https://api-satusehat.kemkes.go.id/fhir-r4/v1/Patient?identifier=https://fhir.kemkes.go.id/id/nik|'.$identityCardNumber, [
                'headers' => $headers,
            ]);

            $responseData = json_decode($response->getBody(), true);
            echo "<pre>";
            var_dump($responseData);
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

    function post_patient()
    {

        // Gantilah dengan access token yang Anda dapatkan setelah proses autentikasi
        $accessToken = $this->oauthService->getAccessToken();

        // dd($accessToken);
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ];

        // Gantilah dengan data yang sesuai
        $data = [

            "resourceType" => "Patient",
            "identifier" => [
                [
                    "use" => "official",
                    "system" => "https://fhir.kemkes.go.id/id/nik",
                    "value" => "1102044510990002"
                ]
            ],
            "active" => true,
            "name" => [
                [
                    "use" => "official",
                    "text" => "RIZKY SAHARA BR SINAGA"
                ]
            ],
            "telecom" => [
                [
                    "system" => "phone",
                    "value" => "",
                    "use" => "mobile"
                ],

            ],
            "gender" => "female",
            "birthDate" => "1999-10-05",
            "deceasedBoolean" => false,
            "address" => [
                [
                    "use" => "home",
                    "line" => [
                        ""
                    ],
                    "city" => '',
                    "postalCode" => null,
                    "country" => "",
                    "extension" => [
                        [
                            "url" => "https://fhir.kemkes.go.id/r4/StructureDefinition/administrativeCode",
                            "extension" => [
                                [
                                    "url" => "province",
                                    "valueCode" => ""
                                ],
                                [
                                    "url" => "city",
                                    "valueCode" => ""
                                ],
                                [
                                    "url" => "district",
                                    "valueCode" => ""
                                ],
                                [
                                    "url" => "village",
                                    "valueCode" => ""
                                ],
                                [
                                    "url" => "rt",
                                    "valueCode" => null
                                ],
                                [
                                    "url" => "rw",
                                    "valueCode" => null
                                ]
                            ]
                        ]
                    ]
                ]
            ],

            "multipleBirthInteger" => 0,
            // "contact" => [
            //     [
            //         "relationship" => [
            //             [
            //                 "coding" => [
            //                     [
            //                         "system" => "http://terminology.hl7.org/CodeSystem/v2-0131",
            //                         "code" => null
            //                     ]
            //                 ]
            //             ]
            //         ],
            //         "name" => [
            //             "use" => "official",
            //             "text" => null
            //         ],
            //         "telecom" => [
            //             [
            //                 "system" => "phone",
            //                 "value" => null,
            //                 "use" => "mobile"
            //             ]
            //         ]
            //     ]
            // ],
            // "communication" => [
            //     [
            //         "language" => [
            //             "coding" => [
            //                 [
            //                     "system" => "urn:ietf:bcp:47",
            //                     "code" => null,
            //                     "display" => null
            //                 ]
            //             ],
            //             "text" => null
            //         ],
            //         "preferred" => true
            //     ]
            // ],
            // "extension" => [
            //     [
            //         "url" => "https://fhir.kemkes.go.id/r4/StructureDefinition/birthPlace",
            //         "valueAddress" => [
            //             "city" => "Aceh",
            //             "country" => "ID"
            //         ]
            //     ],
            //     [
            //         "url" => "https://fhir.kemkes.go.id/r4/StructureDefinition/citizenshipStatus",
            //         "valueCode" => "WNI"
            //     ]
            // ]
        ];
            $body = json_encode($data);
            $client = new Client();
            $request = new GetRequest('POST', 'https://api-satusehat.kemkes.go.id/fhir-r4/v1/Patient', $headers, $body);
            // $response = $client->post('https://api-satusehat.kemkes.go.id/fhir-r4/v1/Patient', [
            //     'headers' => $headers,
            //     'json' => $data,
            // ]);
            // $res = $client->sendAsync($request)->wait();
            $response = json_decode($request->getBody()->getContents());
            dd($response);
        // try {

        //     $client = new Client();
        //     $response = $client->post('https://api-satusehat.kemkes.go.id/fhir-r4/v1/Patient', [
        //         'headers' => $headers,
        //         'json' => $data,
        //     ]);
        //     dd($response);
        //     // Tambahkan log atau pemrosesan lanjutan sesuai kebutuhan
        //     \Log::info('API Response: ' . $response->getBody());
        //     dd($response->getBody());
        //     return response()->json($response->getBody());
        // } catch (\Exception $e) {
        //     // Tambahkan log atau pemrosesan error sesuai kebutuhan
        //     \Log::error('API Error: ' . $e->getMessage());
        //     dd(response()->json($e->getMessage()));
        //     return response()->json($e->getMessage());
        // }
    }

}
