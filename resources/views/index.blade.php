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

<body class="">
    {{-- <div id="app" v-cloak> --}}

    <v-app id="app" v-cloak>
        {{-- <router-view></router-view> --}}
        

        <navbar-component></navbar-component>
        {{-- <v-main> --}}
        <v-row no-gutters class="my-4" id="slider">
            <v-col cols="12">
                {{-- <slider-component></slider-component> --}}
                <carousel-component></carousel-component>
            </v-col>
        </v-row>
        <a href="#welcome"></a>
        @auth
            <p>The user <span style="color: green;">is</span> authenticated</p>
        @endauth

        @guest
            <p>The user is <span style="color: red;">not</span> authenticated</p>
        @endguest
        <v-row no-gutters id="welcome" justify="center" align="center">
            <v-col cols="12" sm="6" md="6" class="px-4">
                {!! $content->content !!}
                {{-- <h2 class="text-center my-2" style="color: #c49a6c;">Bienvenue</h2>
                    
                    <p class="text-justify">Désireuse de m’inspirer des éléments qui m’entourent (matériaux, formes), je crée du mobilier d’intérieur pour meubler l’espace de votre habitat et lui conférer un caractère particulier. Chacune de mes œuvres est unique, soigneusement élaborée avec un design élégant et des finitions de qualité. Des objets qui s’intégreront parfaitement à votre intérieur confortable, aux formes douces et à l’ambiance apaisée.</p>
                    
                    <p class="text-justify">Pour un aperçu de mes créations, se référer au portfolio. Rendez-vous également sur ma page personnelle Pinterest. Vous ne trouvez pas votre bonheur? Vous changeriez un motif sur une commode? N’hésitez pas à m’en parler, ou mieux encore: venez me trouver à mon atelier. Je serai ravie d’en discuter avec vous, et voir dans quelle mesure je peux vous aider à obtenir l’objet qui comblera toutes vos attentes.</p> --}}
            </v-col>
            <v-col cols="12" sm="6" md="4" class="px-4">
                <v-img src="/images/welcome.jpg" width="100%"></v-img>
                {{-- <iframe width="100%" height="300" src="https://www.rts.ch/play/embed?urn=urn:rts:video:12405396&subdivisions=false" allowfullscreen allow="geolocation *; autoplay; encrypted-media"></iframe> --}}
            </v-col>
        </v-row>
        <info-component></info-component>
        <portfolio-component></portfolio-component>
        <about-component></about-component>
        <contact-component></contact-component>
        <footer-component></footer-component>
        <snackbar-component></snackbar-component>
    </v-app>
    {{-- </div> --}}
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>