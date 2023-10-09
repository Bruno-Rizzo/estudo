@extends('layouts.app')

@section('content')

<div class="card mt-3">

    <div class="card-header">
        Livro de Advogados 
    </div>

    <div class="card-body">

        @can('create',App\Models\Post::class)
        <a href="{{route('books.create')}}" class="btn btn-sm btn-secondary">+ Novo Registro</a>
        @endcan

        <form action="{{route('books.search')}}" method="post">
            @csrf

            <div class="row mt-3">
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Advogado" name="adv_name">
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="OAB" name="oab_number">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-sm btn-secondary">
                       <i class="fa fa-search m-1"></i> Pesquisar
                    </button>
                </div>
            </div>

        </form>

        @if (Route::is('books.search'))
            <p class="mt-2">Resultado da Pesquisa</p>
        @else
        <p class="mt-2">Lista dos últimos 5 Posts</p>
        @endif

        <table class="table table-sm table-bordered mt-3">
            <thead>
              <tr>
                <th>Nome do Advogado</th>
                <th>Número OAB</th>
                <th class="text-center">Horário de Entrada</th>
                <th class="text-center">Horário de Saída</th>
                @can('update',App\Models\Post::class)
                <th class="text-center">Editar</th>
                @endcan
                @can('delete',App\Models\Post::class)
                <th class="text-center">Excluir</th>
                @endcan
              </tr>
            </thead>
            <tbody>
              @foreach ($books as $book)
              <tr>
                <td>{{$book->adv_name}}</td>
                <td>{{$book->oab_number}}</td>
                <td class="text-center">{{$book->entrance}}</td>
                <td class="text-center">{{$book->exit}}</td>
                @can('update',App\Models\Post::class)
                <td class="text-center">
                    <a href="{{route('books.edit',$book->id)}}" class="btn btn-sm btn-success">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                @endcan
                @can('delete',App\Models\Post::class)
                <td class="text-center">
                    <form action="{{route('books.destroy',$book->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este Post?')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
                @endcan
              </tr>
              @endforeach
           </tbody>
          </table>

    </div>

</div>

@endsection