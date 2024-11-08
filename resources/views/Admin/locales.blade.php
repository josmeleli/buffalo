@extends('layouts.plantilla')

@section('content')
    <div class="w-100 d-flex justify-content-between mb-3">
        <h1>Locales</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLocal">
            Agregar Productos    
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalLocal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registra un Local</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('local.register')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" id="exampleFormControl" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="exampleFormControl" name="direccion" placeholder="Direccion" required>
                        </div>
                        <input type="submit" class="btn btn-dark d-flex float-right" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locales as $local)
                    <tr>
                        <td>{{ $local->nombre }}</td>
                        <td>{{ $local->direccion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('css')
    
@endsection


@section('js')

@endsection