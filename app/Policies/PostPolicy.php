<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PostPolicy
{
    use HandlesAuthorization;

    public function view()
    {
        return Auth::user()->role->hasPermission('post-visualizar');
    }


    public function create()
    {
        return Auth::user()->role->hasPermission('post-criar');
    }


    public function update()
    {
        return Auth::user()->role->hasPermission('post-editar');
    }


    public function delete()
    {
        return Auth::user()->role->hasPermission('post-excluir');
    }
}
