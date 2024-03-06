<?php

namespace App\Http\Controllers\Practitioner;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends BaseApiController
{

    function searchByNIK($nik) {
        $proses = 'Practitioner?identifier=https://fhir.kemkes.go.id/id/nik|' . $nik;
        $response =  $this->clientProses($proses);
        return $response;
    }

    function searchById($id) {
        $proses = 'Practitioner/' . $id;
        $response =  $this->clientProses($proses);
        return $response;
    }


}
