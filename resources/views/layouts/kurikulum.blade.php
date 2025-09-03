<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>

<body>
    <x-navbar />
    <div class="flex items-center justify-center mt-16 mb-8 w-full h-86 bg-red-primary text-white text-6xl font-raleway font-bold text-center uppercase">
        @yield('k-title')
    </div>
    @yield('content')
    @vite('resources/js/app.js')
    <x-footer/>
</body>

</html>
