@extends('layouts.plantilla')

@section('content')

    <div class="row">
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Descripcion General de Insumos</h5>
                        </div>
                        <div>
                            <select class="form-select" id="yearSelect">
                                <option value="{{ $anioActual }}">{{ $anioActual }}</option>
                                <option value="{{ $anioActual - 1 }}">{{ $anioActual - 1 }}</option>
                            </select>
                        </div>
                    </div>
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                <!-- Card Total Insumos -->
                <div class="card overflow-hidden">
                    <div class="card-body p-4">
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
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                            <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                            <path d="M9 12l.01 0" />
                                            <path d="M13 12l2 0" />
                                            <path d="M9 16l.01 0" />
                                            <path d="M13 16l2 0" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold">Insumos de Stock Bajo </h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <div class="d-flex">
                                    <h4 class="fw-semibold mb-3">{{$insumoBajo}}</h4>
                                </div>
                                <div class="d-flex align-items-center mb-3"></div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-meat" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M13.62 8.382l1.966 -1.967a2 2 0 1 1 3.414 -1.415a2 2 0 1 1 -1.413 3.414l-1.82 1.821" />
                                            <path d="M5.904 18.596c2.733 2.734 5.9 4 7.07 2.829c1.172 -1.172 -.094 -4.338 -2.828 -7.071c-2.733 -2.734 -5.9 -4 -7.07 -2.829c-1.172 1.172 .094 4.338 2.828 7.071z" />
                                            <path d="M7.5 16l1 1" />
                                            <path d="M12.975 21.425c3.905 -3.906 4.855 -9.288 2.121 -12.021c-2.733 -2.734 -8.115 -1.784 -12.02 2.121" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        const insumosPorMes = @json($insumosPorMes);
    </script>
    <script src="{{ asset('js/charts.js') }}"></script>
@endsection
