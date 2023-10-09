@extends('layouts.app')

@section('content')
    <div class="card mt-3">

        <div class="card-header">
            Livro de Advogados - Cadastrar Registro
        </div>

        <form action="{{ route('books.store') }}" method="post">
            @csrf

            <div class="card-body">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nome do Advogado</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="adv_name" value="{{ old('adv_name') }}">
                        @error('adv_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Número OAB</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="oab_number" value="{{ old('oab_number') }}">
                        @error('oab_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Hora Entrada</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="entrance" value="{{ old('entrance') }}">
                        @error('entrance')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Hora Saída</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="exit" value="{{ old('exit') }}">
                        @error('exit')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr>

                <livewire:prisioner />

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
                <a href="{{ route('books.index') }}" class="btn btn-sm btn-secondary">Voltar</a>
            </div>
            
        </form>

    </div>

@endsection
