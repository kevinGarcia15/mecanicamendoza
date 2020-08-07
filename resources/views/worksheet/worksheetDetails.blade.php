@extends('layouts.app')
@section('script')
  <script src="{{asset('js/sweetalert2.min.js')}}"></script>
  <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}" id="theme-styles">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="{{ asset('img/vehicleDetail.jpg') }}" alt="Home">
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

        @if ($workSheetDetail[0]['statusWorksheet'] == 0)
        <div class="col-12 col-lg-7 mx-auto my-2">
          <a
            href="{{route('worksheet.download', $workSheetDetail[0]['worksheet_id'])}}"
            class="btn btn-success btn-block">
            Descargar en PDF
          </a>
        </div>
      @elseif ($workSheetDetail[0]['statusWorksheet'] == 2)
          <div class="col-12 col-lg-7 mx-auto my-2">
            <button
            type="button"
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#freezWorksheet"
            data-whatever="@mdo"
            >
              Congelar
            </button>
          </div>
          <div class="col-12 col-lg-7 mx-auto my-2">
            <button
            class="btn btn-danger btn-block btn_delete">
            Eliminar hoja de trabajo
          </button>
        </div>
        @else
          <div class="d-flex justify-content-center  mx-auto">
            <p class="alert alert-warning">Hoja de trabajo en progreso</p>
          </div>
        @endif
      </div>
    </div>
</div>
<form
  id="delete_worksheet"
  method="post"
  action="{{route('worksheet.destroy', $workSheetDetail[0]['worksheet_id'])}}"
  >
  @csrf
  @method('DELETE')
</form>
@endsection
@section('scriptFooter')
  <script type="text/javascript" src="{{ asset('js/worksheetDetail.js') }}" defer></script>
@endsection
