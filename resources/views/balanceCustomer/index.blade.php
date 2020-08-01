@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="{{ asset('img/balanceCustomer.svg') }}" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Clientes deudores</h1>
            <p class="lead text-secondary">Aqui se mostraran los clientes que tiene una deuda con la empresa.
            </p>
            <p class="lead text-secondary">Puede ver el detalle pulsando en "Detalles"</p>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Direccion</th>
                <th scope="col">Deuda</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
          @forelse ($balanceCustomer as $key)
            <tr>
              <th>{{$key->first_name.' '.$key->last_name}}</th>
              <td>{{$key->phone}}</td>
              <td>{{$key->address}}</td>
              <td>{{'Q.'.$key->total_balance}}</td>
              <td> <a href="{{route('balance.show', $key->client_id )}}">Detalles</a></td>
            </tr>
          @empty
            <tr>
              <td>Lista vacia</td>
            </tr>
          @endforelse
        </tbody>
    </table>
</div>

@endsection
@section('script')
@endsection
