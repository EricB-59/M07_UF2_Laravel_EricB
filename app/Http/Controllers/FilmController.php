<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    // ? API REST FUNCTIONS
    public static function show()
    {
        $films = Film::with('actors')->get();

        return response()->json(json_encode($films));
    }

    // * WEB FUNCTIONS
    /**
     * Count films
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function countFilms()
    {
        $title = "Numeros de peliculas";
        $films_count = Film::count();

        return view('films.count', ["count" => $films_count, "title" => $title]);
    }

    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = 2000)
    {
        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $old_films = Film::where('year', '<=', $year)->get();

        return view('films.list', ["films" => $old_films, "title" => $title]);
    }

    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = 2000)
    {
        $title = "Listado de Pelis Nuevas (Después de $year)";
        $new_films = Film::where('year', '>=', $year)->get();

        return view('films.list', ["films" => $new_films, "title" => $title]);
    }

    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $title = "Listado de todas las pelis";

        $query = Film::query();

        if (!is_null($year)) {
            $query->where('year', $year);
            $title = is_null($genre)
                ? "Listado de todas las pelis filtrado x año"
                : "Listado de todas las pelis filtrado x categoria y año";
        }

        if (!is_null($genre)) {
            $query->whereRaw('LOWER(genre) = ?', [strtolower($genre)]);
            $title = is_null($year)
                ? "Listado de todas las pelis filtrado x categoria"
                : "Listado de todas las pelis filtrado x categoria y año";
        }

        $films = $query->get();

        // Devolver la vista con los resultados
        return view('films.list', ["films" => $films, "title" => $title]);
    }

    public function listFilmsByYear($year)
    {
        $title = "Listado de Pelis Nuevas (Después de $year)";
        $year_films = Film::where('year', '==', $year)->get();

        return view('films.list', ["films" => $year_films, "title" => $title]);
    }

    public function listFilmsByGenre($genre)
    {
        $title = "Listado de Pelis de genero: $genre";
        $genre_films = Film::where("genre", '==', $genre)->get();

        return view('films.list', ["films" => $genre_films, "title" => $title]);
    }

    public function sortFilms()
    {
        $title = "Peliculas ordenadas";

        // Obtener las películas directamente ordenadas por año en orden descendente
        $films = Film::orderBy('year', 'desc')->get();

        // Devolver la vista con los resultados
        return view('films.list', ["films" => $films, "title" => $title]);
    }

    public function createFilm(Request $request)
    {
        $validatedData = $request->validate([
            'nameFilm' => 'required|string|max:255',
            'yearFilm' => 'required|integer',
            'genreFilm' => 'required|string|max:100',
            'countryFilm' => 'required|string|max:100',
            'durationFilm' => 'required|integer',
            'urlFilm' => 'required|url|max:255',
        ]);

        if (Film::where('name', $validatedData['nameFilm'])->exists()) {
            return redirect('/')->withErrors(['duplicateFilm' => 'This film exists']);
        }

        $film = Film::create([
            'name' => $validatedData['nameFilm'],
            'year' => $validatedData['yearFilm'],
            'genre' => $validatedData['genreFilm'],
            'country' => $validatedData['countryFilm'],
            'duration' => $validatedData['durationFilm'],
            'img_url' => $validatedData['urlFilm']
        ]);

        $films = Film::all();

        return view("films.list", ["films" => $films, "title" => "Pelicula: " . $film->name . ", creada con exito"]);
    }
}
