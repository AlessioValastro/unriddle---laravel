<section class="profile__sidebar hidden-sidebar">
    <h2>{{ $username }} - {{ $plan }} user</h2>
    <h3>Esplora i tuoi preferiti:</h3>
    <div class="profile__sidebar--preferiti">
        @forelse($favs as $fav)
            <div class="file-box">
                <a href="open-file/{{ $fav->id }}" target="_blank" class="file-row">{{ $fav->file_name }}</a>
            </div>
        @empty
            <p>Nothing here...</p>
        @endforelse
    </div>
</section>
