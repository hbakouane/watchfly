@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top: 50px">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img class="img-fluid" src="https://image.tmdb.org/t/p/original/{{ $actor['profile_path'] }}"><br>
                <div class="d-flex justify-content-center marginTop">
                    <a href="https://www.facebook.com/{{ $actor_socials['facebook_id'] }}"><i class="fab fa-facebook h1 text-light marginTop mr-2"></i></a>
                    <a href="https://www.instagram.com/{{ $actor_socials['instagram_id'] }}"><i class="fab fa-instagram h1 text-light marginTop mr-2"></i></a>
                    <a href="https://www.twitter.com/{{ $actor_socials['twitter_id'] }}"><i class="fab fa-twitter h1 text-light marginTop mr-2"></i></a>
                </div>
            </div>
            <div class="col-md-9">
                <p class="h1 text-light font-weight-bolder">{{ $actor['name'] }}</p>
                <p class="text-light"> 
                    <i class="fa fa-birthday-cake"></i> {{ \Carbon\Carbon::parse($actor['birthday'])->format("M D, Y") }}
                    (Age: {{ \Carbon\Carbon::parse($actor['birthday'])->age }})
                </p>
                <p class="text-light"> 
                    <i class="fa fa-map-marker-alt"></i> {{ $actor['place_of_birth'] ?? "Undefined" }}
                </p>
                <div class="badge badge-success">{{ $actor['known_for_department'] }}</div>
                <p class="marginTop">
                    <i class="fa fa-star filled"></i> 
                    <span class="text-light">{{ $actor['popularity'] ?? "Undefined" }}</span>
                </p>
                <p class="text-light">
                    {{ $actor['biography'] }}
                </p>
                @if ($popularMovies->count()>0)
                <p class="yellow font-weight-bolder h3">Known for</p>
                <div class="row">
                    @foreach ($popularMovies as $popularMovie)
                        @if (isset($popularMovie['poster_path']))
                            <div class="col-md-2">
                                <a href="/movie/{{ $popularMovie['id'] }}">
                                    <img class="img-fluid" src="https://image.tmdb.org/t/p/original/{{ $popularMovie['poster_path'] }}">
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" style="margin-top: 30px">
    <div class="container">
        <p class="yellow font-weight-bolder h3">Appeared in</p>
        <ol>
        @foreach ($knowForMovies as $knowForMovie)
            <li class="text-light">{{ $knowForMovie['title'] }} <a href="/movie/{{ $knowForMovie['id'] }}"><i class="fa fa-external-link-alt"></i></a></li>
        @endforeach
        </ol>
    </div>
</div>
@endsection