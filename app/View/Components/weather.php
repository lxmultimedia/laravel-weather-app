<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class weather extends Component
{
    public $currentWeather;
    public $futureWeather;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($currentWeather, $futureWeather)
    {
        $this->currentWeather = $currentWeather;
        $this->futureWeather = $futureWeather;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.weather');
    }

    public function translate($description) {

        $response = Http::get("https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=de&dt=t&q=".$description);
        return $response->json()[0][0][0];
    }
}
