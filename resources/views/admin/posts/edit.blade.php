@extends('layouts.app')

@section('content')
    <div class="card mt-3">

        <div class="card-header">
            POSTS - Cadastrar Post
        </div>

        <form action="{{ route('posts.update', $post->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card-body">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="4" name="description">{{ $post->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success">Editar</button>
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-secondary">Voltar</a>
            </div>
        </form>

    </div>
@endsection
