@extends('layouts.app')

@section('content')

    <div class="card mt-3">

        <div class="card-header">
            DASHBOARD
        </div>

        <div class="card-body">

            Bem vindo, <strong>{{Auth::user()->name}}</strong> - {{Auth::user()->role->name}}

        </div>

    </div>

@endsection
