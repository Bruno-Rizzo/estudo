@extends('layouts.app')

@section('content')

<div class="card mt-3">

    <div class="card-header">
        POSTS - Lista de Posts
    </div>

    <div class="card-body">

        @can('create',App\Models\Post::class)
        <a href="{{route('posts.create')}}" class="btn btn-sm btn-secondary">+ Novo Post</a>
        @endcan

        <form action="{{route('posts.search')}}" method="post">
            @csrf

            <div class="row mt-3">
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Título" name="title">
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Autor" name="author">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-sm btn-secondary">
                       <i class="fa fa-search m-1"></i> Pesquisar
                    </button>
                </div>
            </div>

        </form>

        @if (Route::is('posts.search'))
            <p class="mt-2">Resultado da Pesquisa</p>
        @else
        <p class="mt-2">Lista dos últimos 5 Posts</p>
        @endif

        <table class="table table-sm table-bordered mt-3">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th>Título</th>
                <th>Autor</th>
                <th class="text-center">Data Criação</th>
                @can('update',App\Models\Post::class)
                <th class="text-center">Editar</th>
                @endcan
                @can('delete',App\Models\Post::class)
                <th class="text-center">Excluir</th>
                @endcan
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
              <tr>
                <td class="text-center">{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->author}}</td>
                <td class="text-center">{{$post->created_at->format('d/m/Y')}}</td>
                @can('update',App\Models\Post::class)
                <td class="text-center">
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-sm btn-success">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                @endcan
                @can('delete',App\Models\Post::class)
                <td class="text-center">
                    <form action="{{route('posts.destroy',$post->id)}}" method="post">
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