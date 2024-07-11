<nav>
    <section class="nav__section">
        <a href="/home">
            <div class="nav__section--logo">
                <img src="{{ asset('images/vector4.svg') }}" alt="">
                <img src="{{ asset('images/vector5.svg') }}" alt="" class="nav__logo--unriddle">
            </div>
        </a>
        <div class="nav__section--menu">
            <a href="/pricing">Prising</a>
            <a href="" id="affiliate">Affiliate</a>
            @if ($account)
                <button id="login" class="login-button"><a href="profile">Profile</a></button>
            @else
                <button id="login" class="login-button"><a href="login">Log in</a></button>
                <button><a href='signup' id="signup">Sign up</a></button>
            @endif
        </div>
    </section>
</nav>
