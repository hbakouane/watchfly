<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = Http::withToken(env("TMDB_TOKEN"))
        ->get("https://api.themoviedb.org/3/person/popular")
        ->json()['results'];
        return view("actors.index", [
            'actors' => $actors
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actor = Http::withToken(env("TMDB_TOKEN"))
            ->get("https://api.themoviedb.org/3/person/".$id)
            ->json();

        $knowForMovies = Http::withToken(env("TMDB_TOKEN"))
            ->get("https://api.themoviedb.org/3/person/".$id."/movie_credits")
            ->json()['cast'];


        $popularMmoviesArray = Http::withToken(env("TMDB_TOKEN"))
        ->get("https://api.themoviedb.org/3/person/".$id."/movie_credits")
        ->json()['cast'];

        $popularMovies = collect($popularMmoviesArray)
        ->sortByDesc('popurality')
        ->sortByDesc('release_date')
        ->take(5);

        $actor_socials = Http::withToken(env("TMDB_TOKEN"))
            ->get("https://api.themoviedb.org/3/person/".$id."/external_ids")
            ->json();

        return view("actors.show", [
            'actor' => $actor,
            'knowForMovies' => $knowForMovies,
            'actor_socials' => $actor_socials,
            'popularMovies' => $popularMovies
        ]);
    }

}