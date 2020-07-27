@extends('layouts.app')

@section('content')
<div class="container">
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
      <span>Codigo de hoja de trabajo: <strong>{{$workSheetDetail[0]['code']}}</strong></span><br>
      <p class="text-black-50">fecha de ingreso {{$dateCreatedWorksheet[0]['created_at']->format('d/m/y')}}</p>
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
</div>
@endsection
@section('script')
@endsection
