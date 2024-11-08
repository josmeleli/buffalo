@extends('layouts.plantilla')

@section('content')

    <div class="row">
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <h2 class="text-lg font-bold text-red-500">Insumos con Stock Crítico</h2>
                    <div class="table-responsive">
                        <table class="table w-100 table-striped table-bordered text-center" >
                            <thead>
                                <tr class="bg-red-100 text-red-700">
                                    <th class="border border-gray-200 px-4 py-2">Nombre</th>
                                    <th class="border border-gray-200 px-4 py-2">Cantidad</th>
                                    <th class="border border-gray-200 px-4 py-2">Acción</th>
                                </tr>
                            </thead>
                            <tbody id="critical-stock-list">
                                @foreach ($insumosCriticos as $insumo)
                                <tr>
                                    <td class="border px-4 py-2">{{ $insumo->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $insumo->stock }}</td>
                                    <td class="border px-4 py-2">
                                        <a class="bg-primary text-white px-2 py-1 rounded" href="{{route('demo.index')}}">
                                            Reabastecer
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                <!-- Card Total Insumos -->
                <div class="card overflow-hidden">
                    <div class="card-body p-4 ">
                        <h5 class="card-title mb-9 fw-semibold">Total de Insumos</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3">{{$totalInsumo}}</h4>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-calendar text-success"></i>
                                    </span>
                                    <p class="fs-3 mb-0">{{$fechaUltimoInsumo}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 card overflow-hidden">
                        <div class="row align-items-center">
                            <div class="bg-white p-4 rounded-md shadow-md">
                                <h5 class="card-title mb-9 fw-semibold">Total de Insumos Utilizados</h5>
                                <p class="fw-semibold mb-3">{{ $totalUtilizados }}</p>
                                <span class="text-sm text-gray-500">En el último mes</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
