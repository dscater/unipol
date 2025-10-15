<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('imgs/goirdrop.ico') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- CSS --}}
    <link href="{{ asset('assets/portal/css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/portal/css/app.min.css') }}" rel="stylesheet" />

    <style>
        /* Font Montserrat  */
        @font-face {
            font-family: "Montserrat";
            src: url("/webfonts/Montserrat/Montserrat-VariableFont_wght.ttf") format("truetype");
            font-weight: 100 900;
            font-style: normal;
        }

        @font-face {
            font-family: "Montserrat";
            src: url("/webfonts/Montserrat/Montserrat-Italic-VariableFont_wght.ttf") format("truetype");
            font-weight: 100 900;
            font-style: italic;
        }

        /* Font Chau_Philomene_One,Epunda_Slab  */
        @font-face {
            font-family: "Chau_Philomene_One";
            src: url("/webfonts/Chau_Philomene_One,Epunda_Slab/Chau_Philomene_One/ChauPhilomeneOne-Regular.ttf") format("truetype");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: "Chau_Philomene_One";
            src: url("/webfonts/Chau_Philomene_One,Epunda_Slab/Chau_Philomene_One/ChauPhilomeneOne-Italic.ttf") format("truetype");
            font-weight: 400;
            font-style: italic;
        }
    </style>

    <script>
        g_url_assets = "{{ asset('') }}";
    </script>

    @routes
    @vite(['resources/js/portal.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead

</head>

<body class="app-blank">
    <script src="{{ asset('assets/portal/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/portal/js/app.min.js') }}"></script>
    @inertia

</body>

</html>
