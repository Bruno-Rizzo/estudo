@extends('layouts.app')

@section('content')
    <div class="card mt-3">

        <div class="card-header">
            FUNÇÕES - Cadastrar Função
        </div>

        <form action="{{route('roles.store')}}" method="post">
            @csrf

            <div class="card-body">

                <div class="row mb-3">
                    <label class="col-sm-1 col-form-label">Nome</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
    
            </div>
    
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary">Voltar</a>
            </div>

        </form>

    </div>
@endsection
