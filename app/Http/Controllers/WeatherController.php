<?php

namespace App\Http\Controllers;

use App\Services\WeatherAPIService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
   public function getWeather(Request $request)
   {
        $request->validate([
            'location' => ['required']
        ]);

        $data = WeatherAPIService::getWeather($request['location'], $request['days']);

        return response()->view('weather/index', ['data' => $data]);
   }
}
