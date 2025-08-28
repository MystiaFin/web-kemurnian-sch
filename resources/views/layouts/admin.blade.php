<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Panel')</title>
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <main class="flex min-h-screen">
        <x-admin.sidebar />

        <section class="flex-1 bg-gray-50 p-8 overflow-y-auto">
            @yield('content')
        </section>
    </main>
    @vite('resources/js/app.js')
</body>

</html>
