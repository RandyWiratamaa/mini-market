<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Alhamdulillah Mart</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('penjualan/login/css/style.css') }}">
    <script src="{{ asset('penjualan/login/js/fontawesome.js') }}"></script>

</head>

<body>
    <img class="wave" src="{{ asset('penjualan/login/img/wave.png') }}">
    <div class="container">
        <div class="img">
            <img src="{{ asset('penjualan/login/img/shopping.svg') }}">
        </div>
        <div class="login-content">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <img src="{{ asset('penjualan/login/img/avatar.svg') }}">
                <h2 class="title">Alhamdulillah Mart</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="email" class="input username-field @error('email') is-invalid @enderror"
                            name="email" id="email" value="admin@google.com" required="">
                    </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input @error('password') is-invalid @enderror" name="password"
                            id="password" type="password" value="password" required="">
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('penjualan/login/js/main.js') }}"></script>
</body>

</html>
