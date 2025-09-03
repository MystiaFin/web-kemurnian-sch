<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kemurnian Website</title>
    @vite('resources/css/app.css')
</head>

<body>
    {{-- Navbar Component --}}
    <x-navbar />
    <main class="mt-16">
        {{ $slot }}
    </main>
    <x-footer/>
</body>

</html>
