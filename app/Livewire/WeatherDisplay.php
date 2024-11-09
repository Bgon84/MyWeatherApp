<?php

namespace App\Livewire;

use App\Services\WeatherAPIService;
use Livewire\Component;

class WeatherDisplay extends Component
{
    public string $location = '';
   
    public function render()
    {
        $data = ($this->location !== '') ? WeatherAPIService::getWeather($this->location, '5') : '';
        
        //TODO get user prefs

        return view('livewire.weather-display', compact('data'));
    }
}
