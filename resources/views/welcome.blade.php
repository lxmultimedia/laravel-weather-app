<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wetter-App</title>
    <link rel="icon" href="{{ url('favicon.jpg') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Livewire -->
    @livewireStyles

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">

<body class="antialiased bg-gradient-to-tr from-blue-200 to-blue-900 min-h-screen">
<div class="mt-8">
    @livewire('weather-display')
</div>

    @livewireScripts
</body>
</html>
