<?php


use App\Http\Controllers\Location\SearchController as Location;
use App\Http\Controllers\MasterSaranaIndex;
use App\Http\Controllers\Organization\SearchController as Organization;
use App\Http\Controllers\Patient\SearchController as Patient;
use App\Http\Controllers\Practitioner\SearchController as Practitioner;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;








/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Scoope Controller API Search Patient
Route::get('/patients/patientByName/{name}/{birthDate}/{gender}', [Patient::class, 'searchByName']);
Route::get('/patients/patientByNIK/{nik}', [Patient::class, 'searchByNIK']);
Route::get('/patients/patientByIHS/{IHS}', [Patient::class, 'searchByIHS']);
// Scoppe Controller API Search Doctor
Route::get('/practitioner/practititonerByNIK/{nik}', [Practitioner::class, 'searchByNIK']);
Route::get('/practitioner/practititonerById/{id}', [Practitioner::class, 'searchById']);

// Scoppe Controller API Search Organization
Route::get('/organization/organizationByName/{organization}', [Organization::class, 'searchByName']);
Route::get('/organization/organizationById/{id}', [Organization::class, 'searchById']);

// Scoppe Controller API Search Location
Route::get('/location/locationByOrganization/{organization}', [Location::class, 'searchByOrganization']);


Route::get('/master-sarana-index', [MasterSaranaIndex::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
