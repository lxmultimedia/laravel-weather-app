<div class="max-w-full">
    <div class="w-128 max-w-full mx-auto text-sm rounded-lg m-5">
        <input wire:model.lazy="location" wire:keydown.enter="refetch" type="text" class="w-full rounded-md p-2"
               id="location" placeholder="Bitte Stadt eingeben...">
    </div>

    @if (session('message'))
        <p class="text-center text-white mb-4">{{ session('message') }}</pclass>
    @endif

    <div class="w-128 max-w-full mx-auto bg-gray-900 text-white text-sm rounded-lg overflow-hidden">
        <div class="current-weather flex items-center justify-between px-4 px-6">
            <div class="flex items-center">
                <div>
                    <div class="text-5xl font-semibold">
                        {{ round($currentWeather['main']['temp']) }}°
                    </div>
                    <div class="text-gray-400">
                        gefühlt {{ round($currentWeather['main']['feels_like']) }}°
                    </div>
                </div>
                <div class="ml-5">
                    <div class="font-semibold">
                        {{ ucfirst($this->translate($currentWeather['weather'][0]['description'])) }}
                    </div>
                    <div class="text-gray-400 text-xl">
                        {{ $currentWeather['name'] }}
                    </div>
                </div>
            </div>
            <div>
                <img src="https://openweathermap.org/img/wn/{{ $currentWeather['weather'][0]['icon'] }}@4x.png">
            </div>
        </div>
        <ul class="future-weather bg-gray-800 px-4 py-4 space-y-8">
            @foreach ($futureWeather['list'] as $item)
                <li class="grid grid-cols-weather items-center">
                    <div class="text-gray-400 text-xs">
                        {{ $this->translate(strtoupper(\Carbon\Carbon::createFromTimestamp($item['dt'])->format('l H:i')))   }}
                    </div>
                    <div class="flex items-center">
                        <div><img src="https://openweathermap.org/img/wn/{{ $item['weather'][0]['icon'] }}.png"></div>
                        <div>{{ ucfirst($this->translate($item['weather'][0]['description'])) }}</div>
                    </div>
                    <div class="text-right">
                        <div>{{ round($item['main']['temp_min']) }}°</div>
                        <div>{{ round($item['main']['temp_max']) }}°</div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
