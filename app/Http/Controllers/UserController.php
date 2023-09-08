<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
//use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::OrderByDesc('id')->latest()->take(5)->get();
        return view('admin.users.index',compact('users'));
    }

    
    public function create()
    {
        $roles = Role::all(); 
        return view('admin.users.create',compact('roles'));
    }

    
    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();
        $validate['password'] = bcrypt($request->password);
        User::create($validated);
        return to_route('users.index')->with('message','Usuário cadastrado com sucesso!');
    }

   
    public function show(User $user)
    {
        //
    }

    
    public function edit(User $user)
    {
        $roles = Role::all(); 
        return view('admin.users.edit',compact('user','roles'));
    }

    
    public function update(UserUpdateRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);
        return to_route('users.index')->with('info','Usuário editado com sucesso!');
    }

   
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index')->with('info','Usuário excluído com sucesso!');
    }

}
