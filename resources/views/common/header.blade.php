<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <title>
        {{ $title }}
    </title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/jquery.min.js') }}" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />
    <link href="{{ asset('assets/css/calendar.css') }}" rel="stylesheet" type="text/css">

    <style>
        body {
            /* Multiple Backgrounds: Image + Opaque Color Layer */
            background-image:
                /* linear-gradient(rgba(159, 41, 46, 0.7), rgba(159, 41, 46, 0.7)), */
                /* Semi-transparent white overlay */
                url("{{ asset('assets/img/bg-food-2.jpg') }}");
            /* Your background image */
            background-size: cover;
            /* Make the image cover the entire body */
            background-position: center;
            /* Center the image */
            background-repeat: no-repeat;
            /* Prevent image repetition */
            background-color: #f0f0f0;
            /* Fallback background color if image doesn't load or is transparent */
        }
    </style>

    {{-- Bootstrap --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script> --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-red-900 h-screen text-black">
