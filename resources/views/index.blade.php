<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Passion et Créations</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>

    </style>

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
        <v-main>
            <h1>Passion et Créations</h1>
            <example-component></example-component>
            <v-row no-gutters>
                <v-col cols="12">
                    <a href="/home">Home</a> |
                    <a href="/about">About</a> |
                    <a href="/login">Login</a> |
                    <a href="/register">Register</a> |
                    <a href="/student">Student protected page</a> |
                    <a href="/lawyer">Lawyer protected page</a> |
                    <a href="/admin/index">Admin</a> |
                    <a href="/admin/avocats/ajouter">Create new lawyer</a> |
                    <a href="/permanences">Permanences</a> |
                    <a href="/slider">Slider</a> |
                    <a href="/portfolio">Portfolio</a>
                </v-col>
            </v-row>
            {{-- <login-component></login-component> --}}
            <v-row no-gutters justify-center style="border: 2px solid green;">
                <v-col cols="12">
                    {{-- <v-btn small color="blue" class="white--text" @click="incrementCounter">Increment</v-btn> --}}
                    <v-btn small color="orange" class="white--text" @click="getUser">Get user</v-btn>
                    <v-btn small color="success" class="white--text" @click="login">Login</v-btn>

                </v-col>
                <v-col cols="12">
                    Auth::check(): {{ Auth::check() }}<br />
                    {{-- <v-btn small color="pink" class="white--text" @click="login">Login</v-btn> --}}
                    {{-- <v-btn small color="success" class="white--text" @click="register">Register</v-btn> --}}
                    <a href="/forgot-password">Forgot password</a>
                    {{-- <v-btn small color="error" class="white--text" @click="forgotPassword">Forgot password</v-btn> --}}
                    @if (Auth::check())
                    <v-chip class="ma-2" color="success" outlined>
                        User is logged in
                    </v-chip>
                    <v-btn small color="warning" class="white--text" @click="logout">Logout</v-btn>
                    @else
                    <v-chip class="ma-2" color="error">
                        User is not logged in
                    </v-chip>
                    @endif
                </v-col>
                <v-col cols="12">
                    @role('student')
                    I am <span style="color: green;">a</span> student!
                    @else
                    I am <span style="color: red;">not</span> a student.
                    @endrole
                    <br />
                    @role('lawyer')
                    I am <span style="color: green;">a</span> lawyer!
                    @else
                    I am <span style="color: red;">not</span> an lawyer.
                    @endrole
                    <br />
                    @role('admin')
                    I am <span style="color: green;">a</span> admin!
                    @else
                    I am <span style="color: red;">not</span> a admin.
                    @endrole
                </v-col>
            </v-row>
            <v-row no-gutters class="my-4" id="slider">
                <slider-component></slider-component>
            </v-row>
            <a href="#welcome"></a>
            <v-row no-gutters id="welcome" justify="center" align="center">
                <v-col cols="12" sm="6" md="6" class="px-4">
                    <h2 class="text-center red--red my-2">Bienvenue</h2>
                    <p class="text-justify">Désireuse de m’inspirer des éléments qui m’entourent (matériaux, formes), je crée du mobilier d’intérieur pour meubler l’espace de votre habitat et lui conférer un caractère particulier. Chacune de mes œuvres est unique, soigneusement élaborée avec un design élégant et des finitions de qualité. Des objets qui s’intégreront parfaitement à votre intérieur confortable, aux formes douces et à l’ambiance apaisée.</p>
                    
                    <p class="text-justify">Pour un aperçu de mes créations, se référer au portfolio. Rendez-vous également sur ma page personnelle Pinterest. Vous ne trouvez pas votre bonheur? Vous changeriez un motif sur une commode? N’hésitez pas à m’en parler, ou mieux encore: venez me trouver à mon atelier. Je serai ravie d’en discuter avec vous, et voir dans quelle mesure je peux vous aider à obtenir l’objet qui comblera toutes vos attentes.</p>    
                </v-col>
                <v-col cols="12" sm="6" md="4" class="px-4">
                    {{-- <v-img src="/medias/images/welcome.jpg" width="100%"></v-img> --}}
                    <iframe width="100%" height="300" src="https://www.rts.ch/play/embed?urn=urn:rts:video:12405396&subdivisions=false" allowfullscreen allow="geolocation *; autoplay; encrypted-media"></iframe>
                    {{-- <video width="320" height="240" controls>
                        
                        <source src="https://www.rts.ch/play/tv/bon-debarras-/video/belmont-broye-fr--avec-sabine-pirat-et-romain-buchs?urn=urn:rts:video:12405396">
                      Your browser does not support the video tag.
                      </video> --}}
                </v-col>
            </v-row>
            {{-- <v-row no-gutters id="portfolio"></v-row> --}}
            {{-- <a href="#portfolio"></a> --}}
            <portfolio-component></portfolio-component>
            {{-- <v-row no-gutters id="about"></v-row> --}}
            {{-- <a href="#about"></a> --}}
            <about-component></about-component>
            {{-- <v-row no-gutters id="contact"> --}}
                {{-- <a href="#contact"></a> --}}
            <contact-component></contact-component>
            {{-- </v-row> --}}
            <footer-component></footer-component>
            {{-- <router-view></router-view> --}}
        </v-main>
    </v-app>
    {{-- </div> --}}
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>