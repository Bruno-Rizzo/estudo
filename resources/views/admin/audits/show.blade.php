@extends('layouts.app')

@section('content')

<div class="card mt-3">

    <div class="card-header">
        Auditoria - Visualizar Evento
    </div>

    <div class="card-body">

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">
              <strong>Classe Auditada:</strong>
            </label>
            <div class="col-sm-4">
              <input type="text" readonly class="form-control-plaintext" value="{{$audit[0]->auditable_type}}">
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">
              <strong>Usuário Responsável:</strong>
            </label>
            <div class="col-sm-4">
              <input type="text" readonly class="form-control-plaintext" value="{{$user[0]->name}}">
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">
              <strong>Evento:</strong>
            </label>
            <div class="col-sm-4">
              <input type="text" readonly class="form-control-plaintext" 

                  @if( $audit[0]->event == 'created' )
                      value="{{'Cadastro'}}"
                  @elseif($audit[0]->event == 'updated'){
                      value="{{'Edição'}}"
                  @else
                  value="{{'Exclusão'}}"
                  @endif
                  
                 >
            </div>
          </div>

          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">
                <strong>Id Auditado:</strong>
              </label>
              <div class="col-sm-2">
                <input type="text" readonly class="form-control-plaintext" value="{{$audit[0]->auditable_id}}">
              </div>
          </div>

          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">
                <strong>Valores Anteriores:</strong>
              </label>
              <div class="col-sm-7">
                <textarea rows="3" readonly class="form-control-plaintext">{{$audit[0]->old_values}}</textarea>
              </div>
          </div>

          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">
                <strong>Novos Valores:</strong>
              </label>
              <div class="col-sm-7">
                <textarea rows="3" readonly class="form-control-plaintext">{{$audit[0]->new_values}}</textarea>
              </div>
          </div>

          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">
                <strong>Url:</strong>
              </label>
              <div class="col-sm-7">
                <input type="text" readonly class="form-control-plaintext" value="{{$audit[0]->url}}">
              </div>
          </div>

          <div class="row mb-3">
              <label class="col-sm-3 col-form-label">
                <strong>Data:</strong>
              </label>
              <div class="col-sm-4">
                <input type="text" readonly class="form-control-plaintext" value="{{$audit[0]->created_at}}">
              </div>
          </div>

    </div>

</div>

@endsection