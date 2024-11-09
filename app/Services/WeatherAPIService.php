<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;

class WeatherAPIService
{
    public static function getWeather(String $location)
    {
        $client = new \GuzzleHttp\Client();

        $url = env('WEATHER_API_URL') . 'forecast.json?q=' . $location . '&days=5&key=' . env('WEATHER_API_KEY');

        try{
            $response = $client->request('GET', $url, ['timeout' => 10]);
            return json_decode($response->getBody());
        } catch(Exception $e){
            Log::error(
                'An error occurred while attempting to retrieve Weather from WeatherAPI 
                | Error Message = ' . $e->getMessage()
            );
            return 'error';
        }        
    }
}