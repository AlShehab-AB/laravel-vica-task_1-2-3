<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(){
        $users = User::whereNot('id' , auth()->id())->get();
        return view("admin.user.index" , compact('users'));
    }
    public function createUser(){
        $roles = Role::all();
        return view("admin.user.create" , compact('roles'));
    }
    public function storeUser(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'roleName' => 'required|exists:roles,name|string'
        ]);
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password'])
        ]);
        $user->assignRole($validatedData['roleName']);
        return redirect()->route('users.index')->with('success','User created successfully!');;
    }
    public function editUser(User $user){
        $roles = Role::all();
        return view("admin.user.edit" , compact('user','roles'));
    }
    public function updateUser(Request $request, User $user){
        // dd('here');
        $validatedData = $request->validate([
            'name' => 'string|max:50',
            'email' => 'email|unique:users,email,' . $user->id,
            'password' => 'string|nullable',
            'roleName' => 'exists:roles,name|string'
        ]);
        if($validatedData['password']){
            $password = Hash::make($validatedData['password']);

            $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $password
        ]);
        }else{
            $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            ]);
        }

        $user->syncRoles($validatedData['roleName']);
        return redirect()->route('users.index');
    }
    public function destroyUser(User $user){
        $user->delete();
        return redirect()->route('users.index');
    }

}
