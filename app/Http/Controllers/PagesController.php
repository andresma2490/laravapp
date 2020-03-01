<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    public function news(){
        $news = App\Article::all(); // precaución: new es palabra reservada, el modelo no se podía llamar New
        return view('news.allNews', compact('news'));
    }

    public function newsDetail($id=''){
        $article = App\Article::findOrFail($id); // encuentra o sino 404 err
        return view('news.detail', compact('article'));
    }

    public function newsCreate(Request $request){
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

    public function newsEdit($id=''){
        $article = App\Article::findOrFail($id);
        return view('news.edit', compact('article'));
    }

    public function newsUpdate(Request $request, $id){
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

    public function newsDelete($id){
        $article = App\Article::findOrFail($id);
        $article->delete();

        return back()->with('message', 'Noticia Eliminada');
    }

    public function us($name=null){
        $team = ['me', 'myself', 'and Irene'];
        return view('us', compact('team', 'name'));
    }
}
