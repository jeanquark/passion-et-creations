<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

    <title>Nouveau mot de passe</title>

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

<body class="" style="border: 0px solid green">
    <v-app id="app" v-cloak style="border: 0px solid red">
        <reset-password-component token="{{ request()->route('token') }}" email="{{ request()->email }}"></reset-password-component>
        <snackbar-component></snackbar-component>
    </v-app>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>