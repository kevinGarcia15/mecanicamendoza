@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="{{ asset('img/works_to_do.svg') }}" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Tareas a realizar</h1>
            <p class="lead text-secondary">Ingrese las tareas a realizar para el vehículo Placa
                <strong>{{strtoupper($vehicleInfo[0]['plateNumber'])}}</strong>.
            </p>
            <p class="lead text-secondary">Puede agregar más filas pulsando el
              botón "+". Cuando finalice presione el botón "Agregar tarea(s)".
            </p>
            <p class="lead text-secondary">Recuerde asignar a un mecánico responsable para esta hoja de trabajo </p>
        </div>
    </div>
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
        @include('client/_worksAlreadyCreted')
    </div>
    <form action="{{route('worktodo.store')}}" method="post">
        @csrf
        <div class="bg-white py-3 px-4 my-3 shadow rounded">
            @include('client/_worksForm')
            <div class="col-12 col-lg-6 my-2 mx-auto">
                <button class="btn btn-success btn-block" type="submit" name="button">Agregar tarea(s)</button>
            </div>
        </div>
      </form>
        @if ($vehicleInfo[0]['users_id'])
          <div class="bg-white py-3 px-4 my-3 shadow rounded">
            <div class="col-12 col-lg-6 my-2 mx-auto">
              <a
              href="{{route('worksheet.show', $vehicleInfo[0]['worksheet_id'])}}"
              class="btn btn-primary btn-block"
              type="button"
              name="button">
              Ir a la hoja de trabajo
            </a>
          </div>
          <div class="col-12 col-lg-6 my-2 mx-auto">
              <a
                href="{{route('home')}}"
                class="btn btn-outline-primary btn-block"
                type="button"
                name="button">
                Terminar
              </a>
          </div>
        </div>
        @else
          @include('client/_assignUserToWorksheet')
  @endif
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/newClient.js') }}" defer></script>
@endsection
