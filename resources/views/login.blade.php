<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Unriddle</title>
    <link rel="icon" href={{ asset('images/vector4.svg') }}>
    <link rel="stylesheet" href={{ asset('css/login.css') }}>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet" />
    <script defer src={{ asset('js/login.js') }}></script>

</head>

<body>
    <section class="get-started">
        <div class="get-started__content">
            <a href="/home"><img src='{{ asset('images/profile/vector2.svg') }}' alt="" id="exit-cross"></a>
            <div class="get-started__content--left">
                <div class="get-started__left--intro">
                    <img src={{ asset('images/vector4.svg') }} alt="unriddle-logo" />
                    <h2>Welcome Back</h2>
                    <p>Are you ready for Unriddle.ai?</p>
                </div>

                <form name="login" method="post" class="get-started__left--login" autocomplete="off"
                    action="{{ route('login') }}">
                    @csrf
                    <input type="text" placeholder="Your username" name="username" value='{{ old('username') }}'>
                    <input type="password" placeholder="Your password" name="password">
                    <input type="submit" class="submit-button"></input>
                </form>

                @foreach ($errors->all() as $error)
                    <p class='error'>{{ $error }}</p>
                @endforeach

                <div class="get-started__left--divisore">
                    <div class="get-started__divisore--line"></div>
                    <label for="or">OR</label>
                    <div class="get-started__divisore--line"></div>
                </div>

                <div class="get-started__left--continue">
                    <label for="sign-up">Do not have an account? <a href='/signup'>Sign up</a></label>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
