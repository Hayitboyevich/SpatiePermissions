<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions  = Permission::all();
        $permissionsGroup = User::getPermissionGroup();
//        dd($permissionsGroup);
        return view('admin.roles.create', compact('permissions', 'permissionsGroup'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:100|unique:roles'
        ], [
            'name.requried' => 'Please give a role name'
        ]);

        $role =  Role::create(['name' => $request->name]);

        $permissions = $request->input('permissions');

        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        }

        session()->flash('success', 'Role has been created !!');

        return back();
    }
}
