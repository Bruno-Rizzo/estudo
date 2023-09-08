@extends('layouts.app')

@section('content')

<div class="card mt-3">

    <div class="card-header">
        FUNÇÕES - Lista de Funções
    </div>

    <div class="card-body">

        <a href="{{route('roles.create')}}" class="btn btn-sm btn-secondary">+ Nova Função</a>

        <table class="table table-sm table-bordered mt-3">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th >Nome</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Excluir</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)
              <tr>
                <td class="text-center">{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td class="text-center">
                    <a href="{{route('roles.edit',$role->id)}}" class="btn btn-sm btn-success">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                <td class="text-center">
                    <form action="{{route('roles.destroy',$role->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir esta função?')">
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