<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('build/assets/app-2a37e680.css')}}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="{{url('build/assets/app-40420331.js')}}"></script>
    <!-- Scripts -->
    {{--@vite(['resources/css/app.css', 'resources/js/app.js'])--}}
</head>

<body class="bg-white">
    <div class="font-sans text-gray-900 ">
        {{ $slot }}
    </div>
</body>

</html>