<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movie;
class MovieController extends Controller
{
        public function index(){
            return view('movies.index');
        }

        public function show(movie $movie){

            $related_movies = movie::where('id','!=' , $movie->id)
            ->WhereHas('categories',function($query) use($movie){
                return $query->whereIn('category_id',$movie->categories->pluck('id')->toArray());
            })->get();
            return view('movies.show',compact('movie','related_movies'));
            
        }
        public function increment_views(movie $movie){
            $movie->increment('views');
        }
}
