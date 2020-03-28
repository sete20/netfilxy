<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\movie;
use App\category;
use App\user;

class welcomeController extends Controller
{
        public function index(){
            $categories_count = category::count();
            $users_count = user::whereRole('user')->count();
            $movies_count = movie::where('percent', 100)->count();

            return view('dashboard.welcome',compact('categories_count','movies_count','users_count'));
        }//end func
}//end class
