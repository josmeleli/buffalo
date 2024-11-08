@extends('layouts.plantilla')

@section('content')
    <div>
        <div class="col-lg-15 px-3">
            @livewire('insumo-table')
        </div>
    </div>

@endsection

@section('css')
    <style>
        .table-container {
            max-width: 800px;
            margin: 50px auto;
        }
        .form-control {
            margin-bottom: 10px;
        }
    </style>
@endsection


@section('js')

@endsection