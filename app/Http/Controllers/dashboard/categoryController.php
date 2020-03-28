<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_categories')->only(['index']);
        $this->middleware('permission:create_categories')->only(['create', 'store']);
        $this->middleware('permission:update_categories')->only(['edit', 'update']);
        $this->middleware('permission:delete_categories')->only(['destroy']);

    }// end of __construct
    public function index(category $category )
    {
        $categories = Category::WhenSearch(request()->search)->withCount('movies')->paginate(2);
        return view('dashboard.categories.index', compact('categories'));
    }

     public function create()
    {
        return view('dashboard.categories.create');
    }

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

    public function show($id)
    {
        //
    }

    public function edit(category $category)
    {
        return view('dashboard.categories.edit',compact('category'));
    }

   
    public function update(Request $request, category $category)
    {
        request()->validate([
            'name'=>'required|string|min:4|max:30|unique:categories,name,' .$category->id ,
        ]);
        $category->update([
            'name'=>$request->name
        ]);
        session()->flash('success','Data Updated Successfully');
        return redirect(route('dashboard.categories.index'));
    }

    public function destroy(category $category)
    {
        $category->delete();
        session()->flash('success','Data deleted Successfully');
        return redirect(route('dashboard.categories.index'));
    }
}
