@extends('appTemplate')

@section('title')
    EDITAR NOTICIA # {{ $article->id }}
@endsection

@section('content')
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form method="POST" action="{{ route('news.update', $article->id) }}">
        @method('PUT')
        @csrf
        
        <input
            type="text"
            name="title"
            placeholder="Título"
            value="{{ $article->title }}"
            class="form-control mb-2"
        />
        <input
            type="text"
            name="description"
            placeholder="Descripcion"
            value="{{ $article->description }}"
            class="form-control mb-2"
        />

        <hr/>
        <button class="btn btn-success" type="submit">Guardar</button>
        <a class="btn btn-secondary" href="{{ route('news') }}" role="button">Volver</a>
    </form>
@endsection