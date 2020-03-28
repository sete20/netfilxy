<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movie;
class welcomeController extends Controller
{
    public function index(){
        $latest_movies = movie::latest()->limit(2)->get();
        return view('welcome',compact('latest_movies'));
    }
}
