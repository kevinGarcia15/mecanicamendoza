@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="./img/userManagment.svg" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Gestion de usuarios</h1>
            <p class="lead text-secondary">Puedes activar o suspender a uno o
              varios usuarios para tener un control de quienes acceden al sistema.
            </p>
            <p class="lead text-secondary">Puedes ingresar nuevos usuarios clickando el boton "Nuevo usuario"</p>
            <a class="btn btn-lg btn-primary" href="{{ route('register') }}">Nuevo usuario</a>
        </div>
    </div>
    <br><hr>
    <ul class="list-group">
        @forelse ($user as $key)
        <li class="list-group-item border-0 mb-3 shadow-sm">
            <div class="d-flex justify-content-between">
                <div>
                    <span>
                        <strong>{{$key['name'].' -'}}</strong>
                    </span>
                    <span>
                        {{$key['email']}}
                    </span>
                    <span>
                        <strong>Rol: </strong> {{$key['rol']}}
                    </span>
                </div>
                @if ($key['is_enabled'] == 1)
                <form class="" action="{{route('user.update', $key)}}" method="post">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="changeStatus" value="0">
                    <button type="submit" name="button" class="btn btn-danger">Suspender</button>
                </form>
                @else
                <form class="" action="{{route('user.update', $key)}}" method="post">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="changeStatus" value="1">
                    <button type="submit" name="button" class="btn btn-success">Activar</button>
                </form>
                @endif
            </div>
        </li>
        @empty
        <li class="list-group-item border-0 mb-3 shadow-sm">
            No hay datos por mostrar
        </li>
        @endforelse
    </ul>
</div>
@endsection
