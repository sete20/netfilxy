<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(category $category )
    {
        $categories = Category::WhenSearch(request()->search)->paginate(2);
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , category $category)
    {
        request()->validate([
            'name'=>'required|string|min:4|max:30|unique:categories,name',
        ]);
        // dd($request->all());
        $category->create([
            'name'=>$request->name
        ]);
        session()->flash('success','Data Added Successfully');
        return redirect(route('dashboard.categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('dashboard.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        request()->validate([
            'name'=>'required|string|min:4|max:30|unique:categories,name' ,
        ]);
        $category->update([
            'name'=>$request->name
        ]);
        session()->flash('success','Data Updated Successfully');
        return redirect(route('dashboard.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        session()->flash('success','Data deleted Successfully');
        return redirect(route('dashboard.categories.index'));
    }
}
