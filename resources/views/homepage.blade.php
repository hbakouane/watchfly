@extends('layouts.app')

@section('content')
<div class="container-fluid main-movie">
    <div class="container main-movie-container">
        <div class="row">
            @foreach ($topRated as $top)
                @if ($loop->index < 1)
                <div class="col-md-6 left-half-holder">
                    <p class="text-light">— Top Rated</p>
                    <p class="h1 text-light font-weight-bolder capital text-left">{{ $top['original_title'] }}</p>
                    <p>
                        <span>
                            <i class="fa fa-star filled"></i>
                            <span class="text-light"> {{ $top['vote_average'] }} | {{ \Carbon\Carbon::parse($top['release_date'])->format("M D, Y") }} | 
                                @foreach ($top['genre_ids'] as $topGenre)
                                    {{ $genres->get($topGenre) }}@if(!$loop->last), @endif
                                @endforeach    
                            </span>
                        </span>
                    </p>
                    <p class="marginTop text-light h6 movie-description">
                        {{ $top['overview'] }}
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-yellow full-width text-center text-light btn-lg marginTop" style="margin-right: 10px"><i class="fa fa-video"></i> Play Trailer</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-red full-width text-center text-light btn-lg marginTop"><i class="fa fa-film"></i> Watch Movie</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <a href="/movie/{{ $top['id'] }}">
                        <img src="https://image.tmdb.org/t/p/w500/{{ $top['poster_path'] }}" class="img-fluid marginTop rounded main-movie-thumb">
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <p class="text-left h3 font-weight-bolder yellow marginTop">Today's Trending</p>
        <div class="row">
            @foreach ($trendingMovies as $trendingMovie)
                @if ($loop->index < 12)
                <div class="col-md-2 marginTop movieBox">
                    <a href="/movie/{{ $trendingMovie['id'] }}">
                        <img src="https://image.tmdb.org/t/p/w500/{{ $trendingMovie['poster_path'] }}" class="img-fluid movie-img">
                        <p class="text-light font-weight-bold marginTop h5">{{ $trendingMovie['title'] }}</p>
                        <p>
                            <i class="fa fa-star filled"></i> 
                            <span class="text-light">{{ $trendingMovie['vote_average'] }} | </span>
                            <span class="text-light">{{ \Carbon\Carbon::parse($trendingMovie['release_date'])->format('M D, Y') }}</span>
                        </p>
                        <p class="text-light font-weight-bold" style="margin-top: -10px;">
                            @foreach ($trendingMovie['genre_ids'] as $genre)
                                {{ $genres->get($genre) }}@if(!$loop->last), @endif
                            @endforeach    
                        </p>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<div class="container-fluid marginTop">
    <div class="container">
        <p class="text-left h3 font-weight-bolder yellow">Now Playing</p>
        <div class="row">
            @foreach ($nowPlaying as $nowMovie)
                @if ($loop->index < 12)
                <div class="col-md-2 marginTop movieBox">
                    <a href="/movie/{{ $nowMovie['id'] }}">
                        <img src="https://image.tmdb.org/t/p/w500/{{ $nowMovie['poster_path'] }}" class="img-fluid movie-img">
                        <p class="text-light font-weight-bold marginTop h5">{{ $nowMovie['title'] }}</p>
                        <p>
                            <i class="fa fa-star filled"></i> 
                            <span class="text-light">{{ $nowMovie['vote_average'] }} | </span>
                            <span class="text-light">{{ \Carbon\Carbon::parse($nowMovie['release_date'])->format('D M, Y') }}</span>
                        </p>
                        <p class="text-light font-weight-bold" style="margin-top: -10px;">
                            @foreach ($nowMovie['genre_ids'] as $genre)
                                {{ $genres->get($genre) }}@if(!$loop->last), @endif
                            @endforeach    
                        </p>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <p class="yellow font-weight-bolder h3">Tv Shows</p>
        <div class="row">
            @foreach ($tv_shows as $show)
                @if ($loop->index < 12)
                <div class="col-md-2 marginTop movieBox">
                    <a href="/tv/{{ $show['id'] }}">
                        <img src="https://image.tmdb.org/t/p/w500/{{ $show['poster_path'] }}" class="img-fluid movie-img">
                        <p class="text-light font-weight-bold marginTop h5">{{ $show['original_name'] }}</p>
                        <p>
                            <i class="fa fa-star filled"></i> 
                            <span class="text-light">{{ $show['vote_average'] }} | </span>
                            <span class="text-light">{{ \Carbon\Carbon::parse($show['first_air_date'])->format('M D, Y') }}</span>
                        </p>
                        <p class="text-light font-weight-bold" style="margin-top: -10px;">
                            @foreach ($show['genre_ids'] as $genre)
                                {{ $genres->get($genre) ?? "Undefined" }}@if(!$loop->last), @endif
                            @endforeach    
                        </p>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="container-fluid marginTop">
    <div class="container">
        <p class="text-left h3 font-weight-bolder yellow">Popular</p>
        <div class="row">
            @foreach ($popularMovies as $movie)
                @if ($loop->index < 12)
                <div class="col-md-2 marginTop movieBox">
                    <a href="/movie/{{ $movie['id'] }}">
                        <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" class="img-fluid movie-img">
                        <p class="text-light font-weight-bold marginTop h5">{{ $movie['title'] }}</p>
                        <p>
                            <i class="fa fa-star filled"></i> 
                            <span class="text-light">{{ $movie['vote_average'] }} | </span>
                            <span class="text-light">{{ \Carbon\Carbon::parse($movie['release_date'])->format('D M, Y') }}</span>
                        </p>
                        <p class="text-light font-weight-bold" style="margin-top: -10px;">
                            @foreach ($movie['genre_ids'] as $genre)
                                {{ $genres->get($genre) }}@if(!$loop->last), @endif
                            @endforeach    
                        </p>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection