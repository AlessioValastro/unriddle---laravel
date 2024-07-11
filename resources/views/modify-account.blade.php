<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change {{ $par }} | Unriddle</title>
    <link rel="icon" href={{ asset('images/vector4.svg') }}>
    <link rel="stylesheet" href={{ asset('css/login.css') }}>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet" />
</head>

<body>
    <section class="get-started">
        <div class="get-started__content">
            <a href="/profile"><img src='{{ asset('images/profile/vector2.svg') }}' alt="" id="exit-cross"></a>
            <div class="get-started__content--left">
                <div class="get-started__left--intro">
                    <img src={{ asset('images/vector4.svg') }} alt="unriddle-logo" />
                    <h2>Modify you {{ $par }}</h2>
                </div>
                @if ($par == 'password')
                    <form name="change-password" method="post" class="get-started__left--login" autocomplete="off"
                        action="{{ route('change-password') }}">
                        @csrf
                        <input type="password" placeholder="Your new password" name="password">
                        @error('password')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                        <input type="submit" class="submit-button"></input>
                    </form>
                @else
                    <form name="change-username" method="post" class="get-started__left--login" autocomplete="off"
                        action="{{ route('change-username') }}">
                        @csrf
                        <input type="text" placeholder="Your new username" name="username">
                        @error('username')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                        <input type="submit" class="submit-button"></input>
                    </form>
                @endif
            </div>
        </div>
    </section>
</body>

</html>
