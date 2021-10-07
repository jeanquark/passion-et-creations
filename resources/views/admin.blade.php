<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
    <title>Passion et Créations - Admin</title>
</head>

<body>
    <div id="app">
        {{-- <app></app> --}}
        <v-app>
            <router-view></router-view>
            <snackbar-component></snackbar-component>
            {{-- <dialog-component @confirm="onConfirm"></dialog-component> --}}
            {{-- <dialog-component ref="confirm"></dialog-component> --}}
        </v-app>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>