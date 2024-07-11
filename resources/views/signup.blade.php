<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Unriddle</title>
    <link rel="icon" href="{{ asset('images/vector4.svg') }}">
    <link rel="stylesheet" href={{ asset('css/index.css') }}>
    <link rel="stylesheet" href={{ asset('css/signup.css') }}>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script defer src={{ asset('js/signup.js') }}></script>
</head>
<body>
<section class="get-started">
    <div class="get-started__content">
        <a href='/home'><img src={{ asset('images/profile/vector2.svg') }} alt="exit-cross" id="exit-cross"></a>
        <div class="get-started__content--left">
            <div class="get-started__left--intro">
                <img src={{asset('images/vector4.svg')}} alt="unriddle-logo">
                <h2>Welcome</h2>
                <p>Are you ready for Unriddle.ai?</p>
            </div>
            <form name='signup' method='post' class="get-started__left--login" autocomplete="off" action="{{ route('signup') }}">
            @csrf
            <div class="username">
                <input type='text' name='username' placeholder="Your username" value='{{ old("username") }}'>
                <span></span>     
            </div>

            <div class="email">
                <input type='text' name='email' placeholder="Your email" value='{{ old("email") }}'>
                <span></span>
            </div>

            <div class="password">
                <input type='password' name='password' placeholder="Your password">
                <span>Inserisci almeno 8 caratteri</span> 
            </div>
                @foreach($errors->all() as $error)
                <div class='errorj'>
                    <span>{{ $error }}</span>
                </div>
                @endforeach
                <input type="submit" class="submit-button">
            </form>
            <div class="get-started__left--continue">
                <label for="login">Do you have an account? <a href='/login'>Log-in</a></label>
            </div>
        </div>
    </div>
</section>
</body>
</html>
