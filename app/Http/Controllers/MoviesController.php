<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        // Main Section Movie Recommandation
        $recommended = Http::withToken(env("TMDB_TOKEN"))
            ->get("https://api.themoviedb.org/3/movie/upcoming")
            ->json()['results'];

        // Popular Movies Section
        // get the popular movies
        $popularMovies = Http::withToken(env('TMDB_TOKEN'))
            ->get("https://api.themoviedb.org/3/movie/popular")
            ->json()['results'];
        
        
        // get the genres array
        $genresArray = Http::withToken(env('TMDB_TOKEN'))
            ->get("https://api.themoviedb.org/3/genre/movie/list")
            ->json()['genres'];
        // collect the genres array
        $genres = collect($genresArray)->mapWithKeys(function ($genres) {
            return [$genres['id'] => $genres['name']];
        });    

        $tv_shows = Http::withToken(env("TMDB_TOKEN"))
            ->get("https://api.themoviedb.org/3/tv/popular")
            ->json()['results'];


        // Now Playing
        $nowPlaying = Http::withToken(env('TMDB_TOKEN'))
            ->get("https://api.themoviedb.org/3/movie/now_playing")
            ->json()['results'];

        // Trending
        $trendingMovies = Http::withToken(env('TMDB_TOKEN'))
            ->get("https://api.themoviedb.org/3/trending/movie/day")
            ->json()['results'];
    
        // Top Rated Movie
        $topRated = Http::withToken(env('TMDB_TOKEN'))
            ->get("https://api.themoviedb.org/3/movie/top_rated")
            ->json()['results'];
        
        return view("homepage", [
            'popularMovies' => $popularMovies,
            'genres' => $genres,
            'nowPlaying' => $nowPlaying,
            'trendingMovies' => $trendingMovies,
            'tv_shows' => $tv_shows,
            'topRated' => $topRated
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
        // Movie Detaills
        $movie = Http::withToken(env('TMDB_TOKEN'))
            ->get("https://api.themoviedb.org/3/movie/".$id)
            ->json();
        $genresArray = Http::withToken(env('TMDB_TOKEN'))
        ->get("https://api.themoviedb.org/3/genre/movie/list")
        ->json()['genres'];
        $genres = collect($genresArray)->mapWithKeys(function ($genres) {
            return [$genres['id'] => $genres['name']];
        });

        // Similar Movies
        $similarMovies = Http::withToken(env('TMDB_TOKEN'))
        ->get("https://api.themoviedb.org/3/movie/".$id."/similar")
        ->json()['results'];

        // Movie Credits
        $cast = Http::withToken(env('TMDB_TOKEN'))
        ->get("https://api.themoviedb.org/3/movie/".$id."/credits")
        ->json();

        // Movie Image
        $images = Http::withToken(env('TMDB_TOKEN'))
        ->get("https://api.themoviedb.org/3/movie/".$id."/images")
        ->json();

        return view("movies.show", [
            'movie' => $movie,
            'genres' => $genres,
            'casts' => $cast,
            'images' => $images,
            'similarMovies' => $similarMovies
        ]);
    }

}
