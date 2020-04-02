<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movie;
class MovieController extends Controller
{
    public function index()
    {

     
        if (request()->ajax()) {
            $movies = Movie::whenSearch(request()->search)->get();
            return $movies;
        }
        $movies = Movie::WhenFavorite(request()->favorite)
        ->whenSearch(request()->search)
        ->whenCategory(request()->category_name)
        
        ->paginate(20);


        return view('movies.index', compact('movies'));

    }// end of index

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

        public function toggle_favorite(Movie $movie){

            $movie->is_favored ? $movie->users()->detach(auth()->user()->id) : $movie->users()->attach(auth()->user()->id);
       
        }
}
