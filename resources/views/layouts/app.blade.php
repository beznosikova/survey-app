<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') ?? 'Survey App' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 xl:max-w-5xl xl:px-0">
        <div class="flex h-screen flex-col justify-between">
            @include('parts.header')
            <main class="mb-auto">
                @yield('content')
            </main>
        </div>
    </div>
</div>
</body>
</html>
