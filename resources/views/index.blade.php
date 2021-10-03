<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

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

<body class="" style="border: 0px solid green">
    <v-app id="app" v-cloak style="border: 0px solid red">
        <navbar-component></navbar-component>
        <v-main>
            <v-row no-gutters class="mb-4" id="slider">
                <v-col cols="12">
                    <carousel-component></carousel-component>
                </v-col>
            </v-row>
            <a href="#welcome"></a>
            @if ($content) 
                <v-row no-gutters id="welcome" justify="center" align="center">
                    <v-col cols="12" sm="6" md="6" class="px-4">
                        {!! $content->content !!}
                    </v-col>
                    <v-col cols="12" sm="6" md="4" class="px-4">
                        <v-img src="/images/welcome.jpg" width="100%"></v-img>
                    </v-col>
                </v-row>
            @endif
            <info-component></info-component>
            <portfolio-component></portfolio-component>
            <about-component></about-component>
            <contact-component></contact-component>
            <footer-component></footer-component>
            <snackbar-component></snackbar-component>
        </v-main>
    </v-app>
    {{-- <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer></script>  --}}
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>