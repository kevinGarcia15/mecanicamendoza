@extends('layouts.app')

@section('content')
<div class="container">
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
      <span>Codigo de hoja de trabajo: <strong>{{$workSheetDetail[0]['code']}}</strong></span><br>
      <p class="text-black-50">fecha de ingreso {{$dateCreatedWorksheet[0]['workSheetCreated_at']->format('d/m/y')}}</p>
    </div>
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
      @include('worksheet/_vehicleInfo')
    </div>
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
      @include('mechanical/_worksToDo')
    </div>
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
      @include('mechanical/_replacement')
    </div>
    @if ($workSheetDetail[0]['statusWorksheet'] == 2)
      <div class="d-flex justify-content-center bg-white py-3 px-4 my-3 shadow rounded mx-auto">
      <p class="alert alert-success">La tarea ya fué enviada</p>
    </div>
    @else
      <div class="col-12 col-lg-7 mx-auto my-2">
        <form action="{{route('mechanical.update', $workSheetDetail[0]['worksheet_id'])}}" method="post">
            @csrf
            @method('PATCH')
        <input type="hidden" name="verifyEmptyWorks" value="{{count($workToDo)}}">
        <button
        class="btn btn-success btn-block">
        Enviar
      </button>
    </form>
    </div>
    @endif
</div>
@endsection
@section('script')
@endsection
