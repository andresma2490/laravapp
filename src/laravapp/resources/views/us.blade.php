@extends('appTemplate')

@section('title')
    NOSOTROS
@endsection

@section('content')
    <h3>equipo:</h3>
    @foreach($team as $person)
        <a href="{{ route('us',$person) }}">{{ $person }}</a><br/>
    @endforeach

    @if(!empty($name))
        @switch($name)
            @case('me')
                <h3>{{ $name }}:</h3>
                <img src="https://i.pinimg.com/originals/33/89/3b/33893b0b2f26336a4bc25fcc6570e3d5.png" alt="image_profile" width="300px"> 
            @break

            @case('myself')
                <h3>{{ $name }}:</h3>
                <img src="https://img.reelgood.com/content/movie/68458391-5cbf-471c-a00a-cbb35712e6f1/poster-780.jpg" alt="image_profile" width="300px"> 
            @break

            @case('and Irene')
                <h3> Irene: </h3>
                <img src="https://resizing.flixster.com/e8fHriK8jDrlkpWYBvlkeKAXGhE=/300x300/v1.bjsxMTM3MzY7ajsxODM2MTsxMjAwOzEzOTM7MTg1OA" alt="image_profile" width="300px"> 
            @break
        @endswitch
    @endif    
@endsection