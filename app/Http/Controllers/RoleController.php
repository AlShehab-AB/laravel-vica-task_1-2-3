<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::whereNot('id' , auth()->id())->get();
        return view("admin.role.index" , compact('roles'));
    }
    public function create(){
        $permissions = Permission::all();
        return view("admin.role.create" , compact('permissions'));
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'string|required|unique:roles,name',
            'permissions' => 'array',
        ]);
        $role = Role::create(['name' => $validateData['name']]);
        $role->givePermissionTo($validateData['permissions']);
        return redirect()->route('roles.index');
    }
    public function edit($id){
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view("admin.role.edit" , compact('role','permissions'));
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([
            'name' => 'string|required|unique:roles,name',
            'permissions' => 'array',
        ]);
        $role = Role::findOrFail($id);
        $role->update(['name' => $validateData['name']]);
        $role->syncPermissions($validateData['permissions']);
        return redirect()->route('roles.index');
    }
}
