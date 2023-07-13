<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        @livewireStyles

		<link rel="shortcut icon" href="../../img/lgoo.png" />
		<!--begin::Fonts-->
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

        <!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-dark">
		<!--begin::Main-->
		<!--begin::Root-->
        @livewire('login')
        <!--end::Root-->
		<!--end::Main-->
        @livewireScripts
        <!--begin::Javascript-->
		<script>var hostUrl = "../demo1/dist/assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="../demo1/dist/assets/plugins/global/plugins.bundle.js"></script>
		<script src="../demo1/dist/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		{{-- <script src="../demo1/dist/assets/js/custom/authentication/sign-in/general.js"></script> --}}
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
