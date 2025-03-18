<?php

namespace App\Http\Controllers;

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
}
