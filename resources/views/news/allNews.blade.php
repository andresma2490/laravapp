@extends('appTemplate')

@section('title')
    NOTICIAS
@endsection

@section('content')

    @if (Auth::check()) 
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            +
        </button><br/><br/>
    @else
        <p>Para agregar o editar una noticia debes estar logueado</p>
    @endif


    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

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
                    
                    @if (Auth::check()) 
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

    <script>
        $(".delete").on("submit", function(){
            return confirm("Do you want to delete this item?");
        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b>Añadir noticia</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form method="POST" action="{{ route('articles.store') }}">
                @csrf
                <input
                    type="text"
                    name="title"
                    placeholder="Título"
                    class="form-control mb-2"
                />
                <input
                    type="text"
                    name="description"
                    placeholder="Descripcion"
                    class="form-control mb-2"
                />
                <hr/>
                <button class="btn btn-primary" type="submit">Agregar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </form>
        </div>

        </div>
    </div>
    </div>
@endsection