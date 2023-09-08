@extends('layouts.app')

@section('content')

<div class="card mt-3">

    <div class="card-header">
        USUÁRIOS - Lista de Usuários
    </div>

    <div class="card-body">

        <a href="{{route('users.create')}}" class="btn btn-sm btn-secondary">+ Novo Usuário</a>

        <table class="table table-sm table-bordered mt-3">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th >Nome</th>
                <th >Email</th>
                <th class="text-center">Função</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Excluir</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td class="text-center">{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td class="text-center">{{$user->role->name}}</td>
                <td class="text-center">
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-success">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                <td class="text-center">
                    <form action="{{route('users.destroy',$user->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este usuário?')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>

    </div>

</div>

@endsection