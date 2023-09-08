<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleFormRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    
    public function create()
    {
        return view('admin.roles.create');
    }

    
    public function store(RoleFormRequest $request)
    {
        Role::create($request->validated());
        return to_route('roles.index')->with('message','Função cadastrada com sucesso!');
    }

    
    public function show(Role $role)
    {
        //
    }

    
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit',compact('role','permissions'));
    }

    
    public function update(RoleFormRequest $request, Role $role)
    {
        $role->update($request->validated());
        return to_route('roles.index')->with('info','Função editada com sucesso!');
    }

    
    public function destroy(Role $role)
    {
        $role->delete();
        return to_route('roles.index')->with('error','Função excluída com sucesso!');
    }

    public function assignPermissions(Request $request , Role $role)
    {
        $role->permissions()->sync($request->permissions);
        return to_route('roles.index')->with('info','Permissão associada com sucesso!');
    }

}
