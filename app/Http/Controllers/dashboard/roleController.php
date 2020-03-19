<?php

namespace App\Http\Controllers\dashboard;
use App\role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class roleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_roles')->only(['index']);
        $this->middleware('permission:create_roles')->only(['create', 'store']);
        $this->middleware('permission:update_roles')->only(['edit', 'update']);
        $this->middleware('permission:delete_roles')->only(['destroy']);

    }// end of __constr
    public function index(role $role )
    {
        $roles = role::WhereRoleNot(['super_admin'])->WhenSearch(request()->search)->with('permissions')->paginate(10);
        return view('dashboard.roles.index', compact('roles'));
    }

     public function create()
    {
        return view('dashboard.roles.create');
    }

     public function store(Request $request , role $role)
    {
        request()->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions'=>'required|array|min:1',
        ]);
        // dd($request->all());
        $role= role::create($request->all());
        $role->attachPermissions($request->permissions);
        session()->flash('success','Role ADDED Successfully');
        return redirect(route('dashboard.roles.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit(role $role)
    {
        return view('dashboard.roles.edit',compact('role'));
    }

   
    public function update(Request $request, role $role)
    {
        request()->validate([
            'name'=>'required|string|min:4|max:30|unique:roles,name,' . $role->id ,
            'permissions'=>'required|array|min:1',
       
            ]);
        $role->update($request->all());
        $role->syncPermissions($request->permissions);
        session()->flash('success','Data Updated Successfully');
        return redirect(route('dashboard.roles.index'));
    }

    public function destroy(role $role)
    {
        $role->delete();
        session()->flash('success','Data deleted Successfully');
        return redirect(route('dashboard.roles.index'));
    }
}

