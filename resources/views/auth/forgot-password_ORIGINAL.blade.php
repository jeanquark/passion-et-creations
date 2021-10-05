<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
</head>

<body>
    <div>
        @if (session('status'))
        <div class="">
            {{ session('status') }}
        </div>
        @endif
        <h2>Mot de passe oublié</h2>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            @error('email')
            {{ $message }}
            @enderror
            <label for="email">Email</label>
            <input type="email" name="email" value="" />

            <button type="submit">Reset Password</button>

    </div>
</body>

</html>