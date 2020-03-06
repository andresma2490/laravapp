<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ArticleController extends Controller
{ 
    //proteger rutas (requieren auth)
    public function __construct(){
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $news = App\Article::all(); // precaución: new es palabra reservada, el modelo no se podía llamar New
        return view('news.allNews', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        // deberia retornar una vista formulario, en este caso no, yo use un modal
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //return $req->all(); // lo que envía (incluye el token)

        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        
        $newArticle = new App\Article;
        $newArticle->title = $request->title;
        $newArticle->description = $request->description;

        $newArticle->save();

        return back() // pagina atras 
        ->with('message', 'Su artículo fue agregado con exito'); //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $article = App\Article::findOrFail($id); // encuentra o sino 404 err
        return view('news.detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $article = App\Article::findOrFail($id);
        return view('news.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $articleUpdate = App\Article::find($id);
        $articleUpdate->title = $request->title;
        $articleUpdate->description = $request->description;
        $articleUpdate->save();
        return back()->with('message', 'Noticia editada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $article = App\Article::findOrFail($id);
        $article->delete();

        return back()->with('message', 'Noticia Eliminada');
    }
}
