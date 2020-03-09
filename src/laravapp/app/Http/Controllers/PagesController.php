<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    public function us($name=null){
        $team = ['me', 'myself', 'and Irene'];
        return view('us', compact('team', 'name'));
    }
}
