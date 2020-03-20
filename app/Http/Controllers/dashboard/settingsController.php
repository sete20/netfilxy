<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class settingsController extends Controller
{
    public function social_login(){
        return view('dashboard.settings.social_login');

    }

    public function social_links(){
        return view('dashboard.settings.social_links');
        
    }

    public function store(request $request){
        setting($request->all())->save();
        session()->flash('success','Data Added Successfully');
        return redirect()->back();
    }
}
