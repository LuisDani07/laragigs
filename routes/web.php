<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//all listing
Route::get('/', [ListingController::class, 'index']);

//show create form
Route::get('/listings/create',[ListingController::class,'create']);


//store listing data
Route::post('/listings',[ListingController::class,'store']);

//show edit form
Route::get('listings/{listing}/edit', [ListingController::class, 'edit']);

//edit submit to update
Route::put('listings/{listing}', [ListingController::class, 'update']);

//single listing
Route::get('/listings/{listing}',[ListingController::class,'show']);
