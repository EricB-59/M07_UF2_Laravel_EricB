<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{
    // ? API REST FUNCTIONS
    public static function index()
    {
        $actors = Actor::with('films')->get();

        return response()->json($actors);
    }

    // * WEB FUNCTIONS
    public static function countActors(): View
    {
        $title = 'Numero de actores';
        $countActors = Actor::count();
        return view('films.count', ["count" => $countActors, "title" => $title]);
    }

    public static function listActors(): View
    {
        $title = 'Listado de actores';
        $actors = Actor::all();

        return view('actors.list', ["actors" => $actors, "title" => $title]);
    }

    public static function listActorsByDecade($year = null): View
    {
        $title = 'Lista de actores por década' . $year;

        if (is_null($year)) {
            $year = 2000;
        }

        $startYear = $year;
        $endYear = $year + 9;

        $actors = Actor::whereBetween(DB::raw('YEAR(birthdate)'), [$startYear, $endYear])->get();

        return view('actors.list', ['actors' => $actors, 'title' => $title]);
    }


    public static function destroy($id)
    {
        $status = Actor::where('id', $id)->delete();

        return response()->json(["action" => "delete", "status" => $status]);
    }
}
