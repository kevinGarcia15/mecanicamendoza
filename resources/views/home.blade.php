@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="./img/home.svg" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Bienvenido!!</h1>
            <p class="lead text-secondary">Puedes elegir lo que deseas
              hacer aquí abajo.
            </p>
        </div>
    </div>
<br><hr>
    <div class="row">
      @if (Auth::user()->rol == 'Master')
        <div class="col-6 col-lg-3 my-3">
          <div class="card">
            <img class="card-img-top" src="./img/userManagment.svg" alt="">
            <div class="card-body">
              <h5 class="card-title">Gestión de usuarios</h5>
              <a href="{{route('userManagment')}}" class="btn btn-primary btn-block">Visitar</a>
            </div>
          </div>
        </div>
      @endif
      <div class="col-6 col-lg-3 my-3">
        <div class="card">
          <img class="card-img-top" src="./img/worksheet.svg" alt="">
          <div class="card-body">
            <h5 class="card-title">Nueva hoja de trabajo</h5>
            <a href="{{route('client.index')}}" class="btn btn-primary btn-block">Visitar</a>
          </div>
        </div>
      </div>
        <div class="col-6 col-lg-3 my-3">
            <div class="card">
                <img class=" card-img-top" src="./img/works_history.svg" alt="">
                <div class="card-body">
                    <h5 class="card-title">Trabajos realizados</h5>
                    <a href="#" class="btn btn-primary btn-block">Visitar</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 my-3">
            <div class="card">
                <img class=" card-img-top" src="./img/works_in_progress.svg" alt="">
                <div class="card-body">
                    <h5 class="card-title">Trabajos en progreso</h5>
                    <a href="{{route('worksheet.index')}}" class="btn btn-primary btn-block">Visitar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
