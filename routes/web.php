<?php

use App\Http\Controllers\Admin\DahsboardController;
use Illuminate\Support\Facades\Route;






Route::get('/{any}', [DahsboardController::class, 'handleRequest'])->where('any', '.*')->name('dynamic');
