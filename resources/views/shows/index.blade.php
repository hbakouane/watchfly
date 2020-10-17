@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <p class="yellow font-weight-bolder h3">Tv Shows</p>
            <div class="row">
                @foreach ($tv_shows as $show)
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
                @endforeach
            </div>
        </div>
    </div>
@endsection