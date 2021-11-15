<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class WeatherDisplay extends Component
{
    public $currentWeather;
    public $futureWeather;
    public $location;

    public function mount()
    {
        $this->location = 'Lugano';
        $this->fetchWeather();
    }

    public function fetchWeather() {
        $apikey = config('services.openweather.key');

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$this->location}&appid={$apikey}&units=metric");
        $responseFuture = Http::get("https://api.openweathermap.org/data/2.5/forecast?q={$this->location}&cnt=5&&appid={$apikey}&units=metric");

        $this->currentWeather = $response->json();
        $this->futureWeather = $responseFuture->json();
    }

    public function render()
    {
        return view('livewire.weather-display');
    }

    public function translate($description) {

        //$response = Http::get("https://translate.googleapis.com/translate_a/single?client=gtx&sl=de&tl=fr&dt=t&q=".$description);
        //return $response->json()[0][0][0] ?? $description;
        return $description;
    }

    public function refetch()
    {
        $this->fetchWeather();
    }
}
