<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <base href="../../">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="shortcut icon" href="../../img/lgoo.png" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="../demo1/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="../demo1/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet"> 
    
        <!-- Styles -->
        <link type="text/css" href="{{asset('css/style.css') }}" rel="stylesheet">
        <link type="text/css" href="{{asset('css/slick.css') }}" rel="stylesheet">
    
        @livewireStyles
    </head>
    <body id="kt_body" class="bg-dark">
        {{-- <x-user /> --}}
        @livewire('register')
        @livewireScripts
        <script>var hostUrl = "../demo1/dist/assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="../demo1/dist/assets/plugins/global/plugins.bundle.js"></script>
		<script src="../demo1/dist/assets/js/scripts.bundle.js"></script>
		
        </div>
    </body>
</html>
