<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends BaseApiController
{

    function searchByName($organization) {
        $proses = '/Organization?name=' . $organization;
        $response =  $this->clientProses($proses);
        return $response;
    }

    function searchById($id) {
        $proses = '/Organization/' . $id;
        $response =  $this->clientProses($proses);
        return $response;
    }
}
