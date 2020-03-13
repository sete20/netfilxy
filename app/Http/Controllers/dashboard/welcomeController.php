<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
        public function index(){
            return view('dashboard.welcome');
        }//end func
}//end class
