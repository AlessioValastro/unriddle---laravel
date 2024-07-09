<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Unriddle | Faster research</title>
    <link rel="icon" href={{ asset('images/vector4.svg') }}>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href={{ asset('css/profile.css') }} />
    <link rel="stylesheet" href={{ asset('css/index.css') }} />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet" />
    <script defer src={{ asset('js/profile.js') }}></script>
</head>

<body>
    <nav>
        <section class="profile__nav">
            <div class="nav__section--logo">
                <img src={{ asset('images/profile/vector13.svg') }} alt="" class="hamburger">
                <a href="/home"><img src={{ asset('images/vector5.svg') }} alt=""
                        class="nav__logo--unriddle" />
                </a>
            </div>
            <div class="profile__nav--menu">
                <span id="display-plan" class="mobile-hidden">You have a <strong>{{ $plan }}
                    </strong>plan</span>
                <img src={{ asset('images/avatar/default_avatar.png') }} alt="" class="avatar">
                <div class="profile-managment">
                    <a href="">Change username</a>
                    <a href="">Change password</a>
                    <a href="">Change avatar</a>
                    <a href="/pricing">Change plan</a>
                    <a href="" style="color: red">Delete your profile</a>
                </div>
                <button id="support">Support</button>
                <button><a href="{{ route('logout') }}" id="logout">Log out</a></button>
                <img src={{ asset('images/profile/vector6.svg') }} alt="settings" id="profile-settings">
            </div>
        </section>
    </nav>

    @include('components.sidebar')

    <main>
        <header class="profile__welcome">
            <h1>Welcome to unriddle
                {{ $username }} </h1>
            <p>Import a document to understand its contents or start writing in a new note.</p>
            <div class="profile__welcome--grid">
                <div class="profile__grid--block" id="new-note">
                    <img src={{ asset('images/profile/vector12.svg') }} alt="">
                    <div class="profile__block--description">
                        <h3>Write</h3>
                        <p>Create a new note</p>
                    </div>
                    <div class="new-note__box display-none">
                        <form name="note" method="post" action="{{ url('upload-note') }}">
                            @csrf
                            <img src='{{ asset('images/profile/vector2.svg') }}' alt="" id="exit-cross2">
                            <label for="title"><input type="text" name="title"
                                    placeholder="Today I have to..."></label>
                            <label for="note-content" class="big-text__note">
                                <textarea type="textarea" name="note_content" placeholder="Study for the exam!"></textarea>
                            </label>
                            <input type="submit">
                        </form>
                    </div>
                </div>
                <div class="profile__grid--block" id="import-new-file">
                    <img src={{ asset('images/profile/vector14.svg') }} alt="">
                    <div class="profile__block--description">
                        <h3>Import</h3>
                        <p>Add files into your library</p>
                    </div>
                    <div class="import-file__box display-none">
                        <form name="import" method="post" class="import-file__box--form"
                            action="{{ url('/upload-file') }}">
                            @csrf
                            <img src='{{ asset('images/profile/vector2.svg') }}' alt="" id="exit-cross">
                            <label for="file"><img src={{ asset('images/profile/import-icon.svg') }}
                                    alt="">Import a
                                file</label>
                            <input type="file" name="file" accept=".pdf" id="file" required>
                            <span class="file-name" id="fileName"></span>
                            <input type="submit" name="import-submit">
                        </form>
                    </div>
                </div>
                <div class="profile__grid--search">
                    <form name="library-search" class="library__search">
                        <label for="search" class="search-bar">
                            <input type="text" placeholder="Search your library..." id="search-your-library">
                            <a href="">Ask AI</a>
                            <p>Tab</p>
                        </label>
                    </form>
                    <div class="library">
                    </div>
                </div>
                @if ($review)
                    <div class="profile__grid--review">
                        <form name="review-box" class="review__box" method="post" action={{ url('store-review') }}>
                            @csrf
                            <textarea name="review_text" placeholder="Scrivi la tua recensione..."></textarea>

                            <div class="rating">
                                <input type="radio" id="star5" name="review_rating" value="5" />
                                <label title="Eccellente!" for="star5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                        </path>
                                    </svg>
                                </label>
                                <input type="radio" id="star4" name="review_rating" value="4" />
                                <label title="Ottimo!" for="star4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                        </path>
                                    </svg>
                                </label>
                                <input type="radio" id="star3" name="review_rating" value="3" />
                                <label title="Buono" for="star3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                        </path>
                                    </svg>
                                </label>
                                <input type="radio" id="star2" name="review_rating" value="2" />
                                <label title="Discreto" for="star2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                        </path>
                                    </svg>
                                </label>
                                <input type="radio" id="star1" name="review_rating" value="1" />
                                <label title="Pessimo" for="star1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                        </path>
                                    </svg>
                                </label>
                            </div>
                            <input type="submit" id="submit-review">
                        </form>
                    </div>
            </div>
            @endif
        </header>
        <h2>Your Notes</h2>
        <section class="profile__notes-container">
            @forelse ($notes as $note)
                <div class="profile__notes-container--note">
                    <h3>{{ $note->titolo }} <span>{{ date('d/m H:i', strtotime($note->data_creazione)) }}</span></h3>
                    <p>{{ $note->contenuto }}</p>

                    <a href="delete-note/{{ $note->id }}"><button type="submit">Done</button></a>
                </div>

            @empty
                <p>Nothing here...</p>
            @endforelse
        </section>
    </main>
</body>

</html>
