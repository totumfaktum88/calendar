<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="FlexInform Integrált Kft.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/app.ts')
    @inertiaHead
</head>
<body class="mdb-skin">
@routes
@inertia
</body>
</html>