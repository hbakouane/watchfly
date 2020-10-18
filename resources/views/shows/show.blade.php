@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid main-movie-image-single" src="https://image.tmdb.org/t/p/original/{{ $show['poster_path'] }}">
                </div>
                <div class="col-md-6">
                    <p class="h1 text-light font-weight-bolder">{{ $show['original_name'] }}</p>
                    <p>
                        <i class="fa fa-star filled"></i> 
                        <span class="text-light">{{ $show['vote_average'] }} (based on {{ $show['vote_count'] }} votes)</span>
                        <p class="text-light">Last Episode: {{ \Carbon\Carbon::parse($show['last_air_date'])->format('M D, Y') }}</p>
                        <p class="text-light">Next Episode: 
                            @if(isset($show['air_date'])) 
                                {{ \Carbon\Carbon::parse($show['air_date'])->format('M D, Y') ?? "Undefined" }}
                            @else
                            Unkown
                            @endif
                        </p>
                        <p class="text-light">Category: 
                            @foreach ($show['genres'] as $genre)
                                {{ $genre['name'] }}@if(!$loop->last), @endif
                            @endforeach
                        </p>
                    </p>
                    <p class="text-light">Seasons: {{ count($show['seasons']) }}</p>
                    <p class="text-light">Original Language : {{ $show['original_language'] }}
                    <p class="text-light">
                        {{ $show['overview'] }}
                    </p>
                    <button class="btn btn-yellow btn-lg full-width marginTop text-light"><i class="fa fa-video"></i> Play Trailer</button>
                    <button class="btn btn-red btn-lg full-width marginTop text-light"><i class="fa fa-film"></i> Watch Movie</button>
                </div>
            </div>
        </div>
    </div>

    @if (count($similarShows)>0)
    <div class="container-fluid" style="margin-top: 30px">
        <div class="container">
            <p class="text-left h3 font-weight-bolder yellow">Similar shows to {{ $show['original_name'] }}</p>
            <div class="row">
                @foreach ($similarShows as $similarShow)
                    @if ($loop->index < 12)
                    <div class="col-md-2 marginTop movieBox">
                        <a href="/movie/{{ $similarShow['id'] }}">
                            <img src="https://image.tmdb.org/t/p/w500/{{ $similarShow['poster_path'] }}" class="img-fluid movie-img">
                            <p class="text-light font-weight-bold marginTop h5">{{ $similarShow['original_name'] }}</p>
                            <p>
                                <i class="fa fa-star filled"></i> 
                                <span class="text-light">{{ $similarShow['vote_average'] }} | </span>
                                <span class="text-light">{{ \Carbon\Carbon::parse($similarShow['first_air_date'])->format('D M, Y') }}</span>
                            </p>
                            <p class="text-light font-weight-bold" style="margin-top: -10px;">
                                @foreach ($similarShow['genre_ids'] as $genre)
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
@endsection