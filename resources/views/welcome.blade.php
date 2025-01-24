<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
</head>

<body class="container">

    <h1 class="mt-4">Lista de Peliculas</h1>
    <ul>
        <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
        <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
        <li><a href="/filmout/sortFilms">Ordenar pelis</a></li>
        <li><a href="/filmout/countFilms">Contar pelis</a></li>
    </ul>
    <form action="{{ action('App\Http\Controllers\FilmController@createFilm') }}" method="POST">
        {{csrf_field()}}
        <label for="nameFilm">
            Name
            <input type="text" name="nameFilm" required>
        </label><br>
        <label for="yearFilm">
            Year
            <input type="number" name="yearFilm" required>
        </label><br>
        <label for="genreFilm">
            Genre
            <input type="text" name="genreFilm" required>
        </label><br>
        <label for="countryFilm">
            Country
            <input type="text" name="countryFilm" required>
        </label><br>
        <label for="durationFilm">
            Duration
            <input type="number" name="durationFilm" required>
        </label><br>
        <label for="urlFilm">
            Url
            <input type="url" name="urlFilm" required>
        </label><br>
        <input type="submit" value="SEND">
    </form>
    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Include any additional HTML or Blade directives here -->
    @error('wrongUrl')
        <span style="color: red">{{$message}}</span>
    @enderror
    @error('duplicateFilm')
    <span style="color: red">{{$message}}</span>
    @enderror
</body>

</html>
