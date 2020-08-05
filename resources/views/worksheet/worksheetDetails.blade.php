@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="{{ asset('img/vehicleDetail.svg') }}" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Detalle de hoja de trabajo</h1>
            <p class="lead text-secondary">Aquí encontraras el detalle de
              la hoja de trabajo, las tareas realizadas las que están en
              progreso como también encontraras los repuestos y lubricantes que
              se han asignado a este trabajo.
            </p>
            <p class="lead text-secondary">Puede descargar la hoja de trabajo
              pulsando el botón "Descargar PDF".
            </p>
            <p class="lead text-secondary">
              Si todas las tareas fueron realizadas, puedes congelar la
              hoja de trabajo y así quedará archivado. Recuerda que,
              si congelas la hoja de trabajo, ya no se podrá editar mas adelante.
            </p>
        </div>
    </div>
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
      <span>Código de hoja de trabajo: <strong>{{$workSheetDetail[0]['code']}}</strong></span><br>
      <p class="text-black-50 my-0">fecha de ingreso {{$dateCreatedWorksheet[0]['workSheetCreated_at']->format('d/m/y')}}</p>
      @if ($workSheetDetail[0]['statusWorksheet'] == 0)
      <p class="text-black-50">fecha de egreso {{$dateCreatedWorksheet[0]['workSheetUpdated_at']->format('d/m/y')}}</p>
      @endif
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
        <div class="col-12 col-lg-7 mx-auto my-2">
          <button
          type="button"
          class="btn btn-primary btn-block
          @if ($workSheetDetail[0]['statusWorksheet'] == 0)
          btn-hide
          @endif"
          data-toggle="modal"
          data-target="#freezWorksheet"
          data-whatever="@mdo"
          >
            Congelar
          </button>
        </div>
        <div class="col-12 col-lg-7 mx-auto my-2">
          <a
            href="{{route('worksheet.download', $workSheetDetail[0]['worksheet_id'])}}"
            class="btn btn-success btn-block">
            Descargar en PDF
          </a>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
  <script type="text/javascript" src="{{ asset('js/worksheetDetail.js') }}" defer></script>
@endsection
