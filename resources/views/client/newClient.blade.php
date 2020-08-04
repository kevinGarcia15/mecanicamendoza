@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="./img/worksheet.svg" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Nuevo ingreso</h1>
            <p class="lead text-secondary">Llene el formulario en la parte de abajo para
                crear una nueva "Hoja de Trabajo", luego presione el botón "Siguiente" para
                crear las tareas.
            </p>
        </div>
    </div>
    <div id="loading-screen" style="display:none">
        <img src="{{asset('img/spinning-circles.svg')}}">
    </div>
    <form action="{{route('client.store')}}" method="post">
        @csrf
        <div class="bg-white py-3 px-4 my-3 shadow rounded">
            @include('client/_clientForm')
        </div>
        <div class="bg-white py-3 px-4 my-3 shadow rounded">
            @include('client/_vehicleForm')
        </div>
        <div class="bg-white py-3 px-4 my-3 shadow rounded">
            <div class="col-12 col-lg-6 my-2 mx-auto">
                <button
                  class="btn btn-success btn-block"
                  type="submit"
                  name="button">
                  Siguiente
                </button>
            </div>
            <div class="col-12 col-lg-6 my-2 mx-auto">
                <a
                  class="btn btn-danger btn-block"
                  type="button"
                  name="button"
                  href="{{url('/')}}">
                  Cancelar
                </a>
            </div>
        </div>
    </form>
</div>
@include('client/_newBrandModal')
@include('client/_newLineModal')
@include('client/_newColorModal')

@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/newClient.js') }}" defer></script>
@endsection
