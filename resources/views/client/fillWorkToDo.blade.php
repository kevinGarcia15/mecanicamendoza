@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="{{ asset('img/works_to_do.svg') }}" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Tareas a relizar</h1>
            <p class="lead text-secondary">Ingrese las tareas a realziar para el vehiculo No. placa
                <strong>{{$vehicleInfo[0]['plateNumber']}}</strong>.
            </p>
            <p class="lead text-secondary">Puede
                agregar mas filas pulsando el boton "+". Cunado finalice presione el boton "Guardar".</p>
        </div>
    </div>
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
        @include('client/_worksAlreadyCreted')
    </div>
    <form action="{{route('worktodo.store')}}" method="post">
        @csrf
        <div class="bg-white py-3 px-4 my-3 shadow rounded">
            @include('client/_worksForm')
        </div>
        <div class="bg-white py-3 px-4 my-3 shadow rounded">
            <div class="col-12 col-lg-6 my-2 mx-auto">
                <button class="btn btn-success btn-block" type="submit" name="button">Agregar tarea(s)</button>
            </div>
            <div class="col-12 col-lg-6 my-2 mx-auto">
                <a
                  href="{{route('worksheet.show', $newWorkSheet)}}"
                  class="btn btn-warning btn-block"
                  type="button"
                  name="button">
                  Terminar
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/newClient.js') }}" defer></script>
@endsection
