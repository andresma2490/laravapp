@extends('appTemplate')

@section('title')
    TUS NOTICIAS
@endsection

@section('content')
<table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Título</th>
        <th scope="col">Descripción</th>
        <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($news as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->description }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('articles.show', $article) }}" role="button">Ver</a>
                    
                    @if (Auth::check() and Auth::user()->id === $article->user_id)
                        <a class="btn btn-warning" href="{{ route('articles.edit', $article) }}" role="button">Editar</a>
                        
                        <form method="POST" class="delete d-inline" action="{{ route('articles.destroy', $article) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" onclick="return confirm('¿Esta seguro de querer eliminar esta noticia?')" class="btn btn-danger btn-sm" style="padding:7.5px 12px">x</button>
                        </form>
                    @endif

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
