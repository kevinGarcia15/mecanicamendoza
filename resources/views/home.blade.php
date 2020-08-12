@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4 rounded" src="{{asset('img/logoMecanicaMendoza.jpeg')}}" alt="Home">
        </div>
        <div class="col-12 col-lg-6 text-center">
            <h1 class="display-5 text-primary">Bienvenido!!</h1>
            <p class="lead text-secondary">Puedes elegir lo que deseas
              hacer aquí abajo.
            </p>
        </div>
    </div>
<br><hr>
    <div class="row">
      @if (Auth::user()->rol == 'Master' || Auth::user()->rol == 'Administrador')
        <div class="col-6 col-lg-3 my-3">
          <div class="card">
            <img class="card-img-top" src="./img/userManagment.svg" alt="">
            <div class="card-body">
              <h5 class="card-title">Gestión de usuarios</h5>
              <a href="{{route('userManagment')}}" class="btn btn-primary btn-block">Visitar</a>
            </div>
          </div>
        </div>
      <div class="col-6 col-lg-3 my-3">
        <div class="card">
          <img class="card-img-top" src="./img/worksheet.svg" alt="">
          <div class="card-body">
            <h5 class="card-title">Ingresar una nueva hoja de trabajo</h5>
            <a href="{{route('client.index')}}" class="btn btn-primary btn-block">Visitar</a>
          </div>
        </div>
      </div>
        <div class="col-6 col-lg-3 my-3">
            <div class="card">
                <img class=" card-img-top" src="./img/works_history.svg" alt="">
                <div class="card-body">
                    <h5 class="card-title">Historial de vehículos</h5>
                    <a href="{{route('vehicle.history')}}" class="btn btn-primary btn-block">Visitar</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 my-3">
            <div class="card">
                <img class=" card-img-top" src="./img/works_in_progress.svg" alt="">
                <div class="card-body">
                    <h5 class="card-title">Todas las hojas de trabajo</h5>
                    <a href="{{route('worksheet.index')}}" class="btn btn-primary btn-block">Visitar</a>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 my-3">
            <div class="card">
                <img class=" card-img-top" src="{{asset('img/balanceCustomer.svg')}}" alt="">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <a href="{{route('balance.index')}}" class="btn btn-primary btn-block">Visitar</a>
                </div>
            </div>
        </div>
      @elseif (Auth::user()->rol == 'Mecanico')
        <div class="col-6 col-lg-3 my-3">
          <div class="card">
            <img class=" card-img-top" src="./img/my_tasks.svg" alt="">
            <div class="card-body">
              <h5 class="card-title">Mis Tareas</h5>
              <a href="{{route('mechanical.index')}}" class="btn btn-primary btn-block">Visitar</a>
            </div>
          </div>
        </div>
      @endif
    </div>
</div>
@endsection
