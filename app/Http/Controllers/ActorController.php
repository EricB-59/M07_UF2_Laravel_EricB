<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;


class ActorController extends Controller
{
    /**
     * Read Actors from storage
     */
    public static function readActor(): array
    {
        $actors = DB::table('actors')->get();
        $actorsArray = json_decode(json_encode($actors, true), true);

        return $actorsArray;
    }

    public static function countActors(): View
    {
        $title = 'Numero de actores';
        $countActors = DB::table('actors')->count();
        return view('films.count', ["count" => $countActors, "title" => $title]);
    }

    public static function listActors(): View
    {
        $title = 'Listado de actores';
        $actors = ActorController::readActor();

        return view('actors.list', ["actors" => $actors, "title" => $title]);
    }

    public static function listActorsByDecade($year = null): View
    {
        $title = 'Lista de actores por decada';
        if (is_null($year)) {
            $year = 2000;
        }

        $actors = DB::table('actors')->whereBetween('birthdate', [$year . '-01-01', ($year + 10) . '-12-31'])->get();
        $actorsArray = json_decode(json_encode($actors, true), true);


        return view('actors.list', ['actors' => $actorsArray, "title" => $title]);
    }

    public static function destroy($id)
    {
        $status = DB::table("actors")->where("id", $id)->delete();

        return response()->json([
            "action" => "delete",
            "status" => $status
        ]);
    }
}
