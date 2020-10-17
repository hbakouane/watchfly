@extends('layouts.app')

@section('content')
<div class="container-fluid main-movie">
    <div class="container main-movie-container">
        <div class="row">
            <div class="col-md-6 left-half-holder">
                <p class="h1 text-light font-weight-bolder capital text-left">welcome TO THE SUDDEN DEATH</p>
                <p>
                    <span><i class="fa fa-star filled"></i><span class="text-light"> 4.9 / 5 | Sep 12, 2020 | Action, Drama, Comedie </span></span>
                </p>
                <p class="marginTop text-light h6 movie-description">
                    Jesse Freeman is a former special forces officer and explosives expert now working a regular job as a
                    security guard in a state-of-the-art basketball arena. Trouble erupts when a tech-savvy cadre of 
                    terrorists kidnap the team's owner and Jesse's daughter during opening night. Facing a ticking 
                    clock and impossible odds, it's up to Jesse to not only save them but also a full house of fans 
                    in this highly charged action thriller.
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
                <img src="https://fr.web.img4.acsta.net/pictures/17/11/09/02/17/0404218.jpg" class="img-fluid marginTop main-movie-thumb">
            </div>
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