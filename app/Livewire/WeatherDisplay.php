<?php

namespace App\Livewire;

use App\Services\WeatherAPIService;
use Livewire\Component;
use App\Services\UserPreferencesService;
use Illuminate\Support\Facades\Auth;

class WeatherDisplay extends Component
{
    public string $location = '';
   
    public function render()
    {
        $preferences = UserPreferencesService::getUserPreferences(Auth::user()->id);

        $this->location = $preferences->favorite_location ?? $this->location;

        $data = ($this->location !== '') ? WeatherAPIService::getWeather($this->location, '5') : '';
        
        $tempUnit = $preferences->temp_metric == 1 ? 'C' : 'F';
        $windUnit = $preferences->wind_metric == 1 ? 'kph' : 'mph';
        $pressureUnit = $preferences->pressure_millibar == 1 ? 'mb' : 'inHg';

        return view('livewire.weather-display', compact(
            'data',
            'tempUnit',
            'windUnit',
            'pressureUnit',
        ));
    }
}
