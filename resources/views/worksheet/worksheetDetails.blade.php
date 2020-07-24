@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="{{ asset('img/vehicleDetail.svg') }}" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Detalle de hoja de trabajo</h1>
            <p class="lead text-secondary">Aquí encontraras el detalle de la
              hoja de trabajo, las tareas realizadas las que están en progreso
              como también encontraras los repuestos y lubricantes que se han
              asignado a este trabajo.
            </p>
            <p class="lead text-secondary">Puesdes descargar la hoja de trabajo
                pulsando el boton "descargar".
            </p>
        </div>
    </div>
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
      <span>Codigo de hoja de trabajo: <strong>{{$workSheetDetail[0]['code']}}</strong></span><br>
      <p class="text-black-50">fecha de ingreso {{$dateCreatedWorksheet[0]['created_at']->format('d/m/y')}}</p>
    </div>
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
      @include('worksheet/_clientInfo')
    </div>
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
      @include('worksheet/_vehicleInfo')
    </div>
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
      @include('worksheet/_worksToDo')
    </div>
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
      @include('worksheet/_replacement')
    </div>

    <div class="bg-white py-3 px-4 my-3 shadow rounded">
      <div class="row">
        <div class="col-10">
        </div>
        <div class="col-2">
          <a href="{{route('worksheet.download', $workSheetDetail[0]['worksheet_id'])}}" class="btn btn-secundary">Descargar</a>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
@endsection
