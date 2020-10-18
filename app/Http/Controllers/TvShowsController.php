<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvShowsController extends Controller
{
    public function index() {
        $tv_shows = Http::withToken(env("TMDB_TOKEN"))
            ->get("https://api.themoviedb.org/3/tv/popular")
            ->json()['results'];

        // get the genres array
        $genresArray = Http::withToken(env('TMDB_TOKEN'))
            ->get("https://api.themoviedb.org/3/genre/movie/list")
            ->json()['genres'];
        // collect the genres array
        $genres = collect($genresArray)->mapWithKeys(function ($genres) {
            return [$genres['id'] => $genres['name']];
        });    

        return view("shows.index", [
            'tv_shows'=>  $tv_shows,
            'genres' => $genres,
        ]);
    }

    public function show($id) {
        $show = Http::withToken(env("TMDB_TOKEN"))
            ->get("https://api.themoviedb.org/3/tv/".$id)
            ->json();
         
        $images = Http::withToken(env("TMDB_TOKEN"))
            ->get("https://api.themoviedb.org/3/tv/".$id."/images")
            ->json();
         
        $similarMovies = Http::withToken(env("TMDB_TOKEN"))
            ->get("https://api.themoviedb.org/3/tv/".$id."/similar")
            ->json()['results'];
         
        // get the genres array
        $genresArray = Http::withToken(env('TMDB_TOKEN'))
            ->get("https://api.themoviedb.org/3/genre/movie/list")
            ->json()['genres'];
        // collect the genres array
        $genres = collect($genresArray)->mapWithKeys(function ($genres) {
            return [$genres['id'] => $genres['name']];
        });  

        return view("shows.show", [
            'show' => $show,
            'images' => $images,
            'similarShows' => $similarMovies,
            'genres' => $genres
        ]);
    }
}
