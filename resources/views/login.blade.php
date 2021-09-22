<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Passion et Créations</title>

    <!-- Favicon -->
    <link rel="icon" href="/images/favicon.png" type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito';
        }

        [v-cloak] {
            display: none;
        }
    </style>
</head>

<body class="">
    {{-- <div id="app" v-cloak> --}}

    <v-app id="app" v-cloak>
        {{-- <navbar-component></navbar-component> --}}
        <login-component></login-component>
    </v-app>
    {{-- </div> --}}
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>