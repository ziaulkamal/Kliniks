<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends BaseApiController
{

    function searchByNIK($nik) {
        $proses = 'Patient?identifier=https://fhir.kemkes.go.id/id/nik|' . $nik;
        $response =  $this->clientProses($proses);
        return $response;
    }

    function searchByName($name,$birthDate,$gender)
    {
        $proses = 'Patient?name='.$name . '&birthdate=' .$birthDate . '&gender='.$gender;
        $response =  $this->clientProses($proses);
        return $response;
    }

    function searchByIHS($IHS)
    {
        $proses = 'Patient?identifier=https://fhir.kemkes.go.id/id/ihs|' . $IHS;
        $response =  $this->clientProses($proses);
        return $response;
    }
}
