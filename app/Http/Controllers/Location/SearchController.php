<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends BaseApiController
{
    function searchByIdentifier($nik) {
        $proses = 'Location?identifier=http://sys-ids.kemkes.go.id/location/1000001|G-2-R-1A' . $nik;
        $response =  $this->clientProses($proses);
        return $response;
    }

    function searchByOrganization($organization) {
        $proses = 'Location?organization=' . $organization;
        $response =  $this->clientProses($proses);
        return $response;
    }
}
