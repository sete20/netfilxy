<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Movie;
use App\Jobs\StreamMovie;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_movies')->only(['index']);
        $this->middleware('permission:create_movies')->only(['create', 'store']);
        $this->middleware('permission:update_movies')->only(['edit', 'update']);
        $this->middleware('permission:delete_movies')->only(['destroy']);

    }// end of __construct

    public function index()
    {
        
        $movies = Movie::paginate(5);

        return view('dashboard.movies.index', compact('categories', 'movies'));

    }//end of index

    public function create()
    {
        $movie = Movie::create([]);

        return view('dashboard.movies.create', compact( 'movie'));

    }//end of create

    public function store(Request $request)
    {
        $movie = Movie::FindOrFail($request->movie_id);
        $movie->update([
            'name' => $request->name,
            'path' => $request->file('movie')->store('movies'),
        ]);

        //the job in background
        $this->dispatch(new StreamMovie($movie));

        return $movie;

    }//end of store

    public function show(Movie $movie)
    {
        return $movie;

    }// end of show

    public function edit(Movie $movie)
    {
    
        return view('dashboard.movies.edit', compact(' movie'));

    }//end of edit

    public function update(Request $request, Movie $movie)
    {
    

       


    }//end of update



 

}//end of controller
