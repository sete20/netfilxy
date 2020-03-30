<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movie;
use App\category;

class welcomeController extends Controller
{
    public function index(){
        $latest_movies = movie::latest()->limit(2)->get();
        $categories = category::with('movies')->get();
        
        return view('welcome',compact('latest_movies','categories'));
    }
}
