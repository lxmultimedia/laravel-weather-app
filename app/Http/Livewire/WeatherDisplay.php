<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class WeatherDisplay extends Component
{
    public $currentWeather;
    public $futureWeather;
    public $location = null;
    private $defaultLocation = 'Winterthur';

    public function mount()
    {
        $this->fetchWeather();
    }

    public function fetchWeather() {

        $location = $this->location ?? $this->defaultLocation;

        $apikey = config('services.openweather.key');

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apikey}&units=metric");
        $responseFuture = Http::get("https://api.openweathermap.org/data/2.5/forecast?q={$location}&cnt=5&&appid={$apikey}&units=metric");

        $this->currentWeather = $response->json();
        $this->futureWeather = $responseFuture->json();

        if($this->currentWeather['cod']=='404') {
            Session::flash('message', "Die gewählte Stadt ist ungültig");
            redirect('/');
        }
    }

    public function render()
    {
        return view('livewire.weather-display');
    }

    public function translate($description) {

        $response = Http::get("https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=de&dt=t&q=".$description);
        return $response->json()[0][0][0] ?? $description;
    }

    public function refetch()
    {
        $this->fetchWeather();
    }
}
