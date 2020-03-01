@extends('appTemplate')

@section('title')
    NOTICIA # {{ $article->id }}
@endsection

@section('content')
    <h3><b>{{ $article->title }}</b></h3>
    {{ $article->description }}
@endsection