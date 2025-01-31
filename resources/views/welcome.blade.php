<x-app-layout>
    <div class="container">
        <h1 class="mt-4">Lista de Películas</h1>
        <ul class="list-group mb-4">
            <li class="list-group-item"><a href="/filmout/oldFilms">Pelis antiguas</a></li>
            <li class="list-group-item"><a href="/filmout/newFilms">Pelis nuevas</a></li>
            <li class="list-group-item"><a href="/filmout/sortFilms">Ordenar pelis</a></li>
            <li class="list-group-item"><a href="/filmout/countFilms">Contar pelis</a></li>
        </ul>

        <form action="{{ action('App\\Http\\Controllers\\FilmController@createFilm') }}" method="POST">
            {{ csrf_field() }}
            <label for="nameFilm">
                Name
                <input type="text" class="form-control" name="nameFilm" required>
            </label>
            <label for="yearFilm">
                Year
                <input type="number" class="form-control" name="yearFilm" required>
            </label>
            <label for="genreFilm">
                Genre
                <input type="text" class="form-control" name="genreFilm" required>
            </label>
            <label for="countryFilm">
                Country
                <input type="text" class="form-control" name="countryFilm" required>
            </label>
            <label for="durationFilm">
                Duration
                <input type="number" class="form-control" name="durationFilm" required>
            </label>
            <label for="urlFilm">
                Url
                <input type="text" class="form-control" name="urlFilm" required>
            </label>
            <input type="submit" class="btn btn-primary" value="SEND">
        </form>

        <!-- Include any additional HTML or Blade directives here -->
        @error('wrongUrl')
            <span style="color: red">{{ $message }}</span>
        @enderror
        @error('duplicateFilm')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    </main>
</x-app-layout>
