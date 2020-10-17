@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <p class="yellow h3 font-weight-bolder">Popular actors</p>
            <div class="row marginTop">
            @foreach ($actors as $actor)
            <div class="col-md-2 marginBottom">
                <a href="/actor/{{ $actor['id'] }}">
                    <img class="img-fluid avatar" src="https://image.tmdb.org/t/p/original/{{ $actor['profile_path'] }}"> 
                    <p class="text-light marginTop">{{ $actor['name'] }}</p>
                </a>
            </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection