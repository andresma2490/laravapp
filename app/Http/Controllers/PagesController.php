<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function news($number=''){
        return view('news', compact('number'));
    }

    public function us($name=null){
        $team = ['me', 'myself', 'and Irene'];
        return view('us', compact('team', 'name'));
    }
}
