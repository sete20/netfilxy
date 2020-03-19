<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;
use App\role;

class userController extends Controller
{
    public function index(user $user )
    {
        $users = user::whereRoleNot('super_admin')->WhenSearch(request()->search)->with('roles')->paginate()->all();
        return view('dashboard.users.index', compact('users'));
    }

     public function create()
    {
        $roles = role::WhereRoleNot(['super_admin','admin'])->get();
        return view('dashboard.users.create',compact('roles'));
    }

     public function store(Request $request , user $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' ,
            'password' => 'required|confirmed|string|min:6|max:50',            
            'role_id'=>'required|numeric',
        ]);
      
        $request->merge(['password'=>bcrypt($request->password)]);
        // dd($request->all());
        $user= user::create($request->all());
        $user->attachRoles(['admin',$request->Role_id]);
        session()->flash('success','User ADDED Successfully');
        return redirect(route('dashboard.users.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit(user $user)
    {
        $roles= role::WhereRoleNot(['super_admin','admin'])->get();
        return view('dashboard.users.edit',compact('user','roles'));
    }

   
    public function update(Request $request, user $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id'=>'required|numeric',
       
            ]);
        $user->update($request->all());
        $user->syncRoles(['admin',$request->role_id]);
        session()->flash('success','Data Updated Successfully');
        return redirect(route('dashboard.users.index'));
    }

    public function destroy(user $user)
    {
        $user->delete();
        session()->flash('success','Data deleted Successfully');
        return redirect(route('dashboard.users.index'));
    }
}//end of controller
