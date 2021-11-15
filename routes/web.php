<?php

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

Route::get('/', function () {
    $apikey = config('services.openweather.key');
    $location = request()->location ??  'Zurich';
    $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apikey}&units=metric");
    $responseFuture = Http::get("https://api.openweathermap.org/data/2.5/forecast?q={$location}&cnt=5&&appid={$apikey}&units=metric");
    //dump($response->json());
    return view('welcome', ['currentWeather' => $response->json(), 'futureWeather' => $responseFuture->json()]);
});
