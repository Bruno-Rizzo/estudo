@extends('layouts.app')

@section('content')
    <div class="card mt-3">

        <div class="card-header">
            Livro de Advogados - Editar Registro
        </div>

        <form action="{{ route('books.update', $book->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nome do Advogado</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="adv_name" value="{{ $book->adv_name }}">
                        @error('adv_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Número OAB</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="oab_number" value="{{ $book->oab_number }}">
                        @error('oab_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Hora Entrada</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="entrance" value="{{ $book->entrance }}">
                        @error('entrance')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Hora Saída</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="exit" value="{{ $book->exit }}">
                        @error('exit')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr>

                <div class="d-flex">

                    <div class="row col-sm-6">

                        <div>
                            @foreach ($book->prisioner as $item)
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label">Nome</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="prisioner[]"
                                            value="{{ $item }}">
                                        @error('prisioner')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>


                    <div class="row col-sm-6">

                        <div>
                            @foreach ($book->identity as $item)
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label ms-3">Identidade</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="identity[]"
                                            value="{{ $item }}">
                                        @error('prisioner')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-success">Editar</button>
                    <a href="{{ route('books.index') }}" class="btn btn-sm btn-secondary">Voltar</a>
                </div>

        </form>

    </div>
@endsection
