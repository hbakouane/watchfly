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
                        <p class="text-light">Next Episode: {{ \Carbon\Carbon::parse($show['next_episode_to_air'])->format('M D, Y') ?? "Undefined" }}</p>
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
@endsection