<?php


use App\Http\Controllers\ApiSatuSehat;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;



// Route::get('patient/search/{value}', [ApiSatuSehat::class, 'tokenPatient']);
Route::get('patient/search/cardNumber/{identityCardNumber}', [FeatureController::class, 'searchPatientByNik']);
Route::get('patient/search/cardBadge/{name}/{birthDate}/{gender}', [FeatureController::class, 'searchPatientByName']);
