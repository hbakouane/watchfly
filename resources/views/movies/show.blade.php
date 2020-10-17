@extends('layouts.app')

@section('content')
    @if ($movie['adult']==true)
        <div class="container-fluid alert-danger" style="padding-top: 20px;padding-bottom: 20px;margin-top:-23px;">
            <div class="container">
                <strong>Attention please:</strong> This is a movie for aduls <strong>+18</strong>.
            </div>
        </div>
    @endif
    <div class="container-fluid" style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid main-movie-image-single" src="https://image.tmdb.org/t/p/original/{{ $movie['poster_path'] }}">
                </div>
                <div class="col-md-6">
                    <p class="h1 text-light font-weight-bolder">{{ $movie['title'] }}</p>
                    <p>
                        <i class="fa fa-star filled"></i> 
                        <span class="text-light">{{ $movie['vote_average'] }} (based on {{ $movie['vote_count'] }} votes)</span>
                        <p class="text-light">Date: {{ \Carbon\Carbon::parse($movie['release_date'])->format('M D, Y') }}</p>
                        <p class="text-light">Category: 
                            @foreach ($movie['genres'] as $genre)
                                {{ $genre['name'] }}@if(!$loop->last), @endif
                            @endforeach
                        </p>
                    </p>
                    <p class="text-light">Status :
                        @if ($movie['status']=="Released")
                            <span class="badge badge-success">Released</span>
                        @else
                            <span class="badge badge-warning">Upcomming</span>
                        @endif
                    </p>
                    <p class="text-light">Original Language : {{ $movie['original_language'] }}
                    <p class="text-light">
                        {{ $movie['overview'] }}
                    </p>
                    <button class="btn btn-yellow btn-lg full-width marginTop text-light"><i class="fa fa-video"></i> Play Trailer</button>
                    <button class="btn btn-red btn-lg full-width marginTop text-light"><i class="fa fa-film"></i> Watch Movie</button>
                </div>
            </div>
        </div>
    </div>

    @if (count($similarMovies)>0)
    <div class="container-fluid" style="margin-top: 30px">
        <div class="container">
            <p class="text-left h3 font-weight-bolder yellow">Similar movies to {{ $movie['title'] }}</p>
            <div class="row">
                @foreach ($similarMovies as $similarMovie)
                    @if ($loop->index < 12)
                    <div class="col-md-2 marginTop movieBox">
                        <a href="/movie/{{ $similarMovie['id'] }}">
                            <img src="https://image.tmdb.org/t/p/w500/{{ $similarMovie['poster_path'] }}" class="img-fluid movie-img">
                            <p class="text-light font-weight-bold marginTop h5">{{ $similarMovie['title'] }}</p>
                            <p>
                                <i class="fa fa-star filled"></i> 
                                <span class="text-light">{{ $similarMovie['vote_average'] }} | </span>
                                <span class="text-light">{{ \Carbon\Carbon::parse($similarMovie['release_date'])->format('D M, Y') }}</span>
                            </p>
                            <p class="text-light font-weight-bold" style="margin-top: -10px;">
                                @foreach ($similarMovie['genre_ids'] as $genre)
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
    @endif

    @if (count($images)>0)
    <div class="container-fluid" style="margin-top: 40px">
        <div class="container">
            <p class="yellow font-weight-bold h1">Images</p>
            <p class="text-light text-right hidden" onclick="closeBigImage()" id="close">Close big image <i class="fa fa-times"></i></p>
            <img class="img-fluid hidden full-width" id="big-image" src="">
            <div class="row">
                @foreach ($images['backdrops'] as $image)
                    @if ($loop->index < 12)
                        <div class="col-md-3">
                            <img class="img-fluid pointer" onclick="changeBigImage(this.src), window.location.href='#close'" style="margin-top: 30px" src="https://image.tmdb.org/t/p/original/{{ $image['file_path'] }}">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if (count($casts['cast'])>0)
    <div class="container-fluid" style="margin-top: 40px">
        <div class="container">
            <p class="yellow font-weight-bold h1">Cast</p>
            <div class="row">
                @foreach ($casts['cast'] as $cast)
                    @if ($loop->index < 12)
                    <div class="card-body col-md-2 marginBottom movieBox">
                        <a href="/actor/{{ $cast['id'] }}">
                            @if (!empty($cast['profile_path']))
                            <img class="img-fluid" src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path'] }}">
                            @else
                            <div class="alert alert-secondary" style="height: 340px;">Image unavailable</div>
                            @endif
                            <p class="text-light h5 marginTop">{{ $cast['name'] }}</p>
                            <p class="text-light h6 marginTop">{{ $cast['character'] }}</p>
                        </a>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif
@endsection