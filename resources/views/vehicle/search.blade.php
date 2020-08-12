@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="{{ asset('img/search.svg') }}" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Busqueda</h1>
            <p class="lead text-secondary">Resultados de la busqueda
            </p>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Placa</th>
                <th scope="col">Descripción</th>
                <th scope="col">Modelo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($plateFind as $key)
            <tr>
                <td>{{strtoupper($key['plateNumber'])}}</td>
                <td>
                    {{$key['brand_name'].' '.$key['line_name'].' '
                    .$key['color_name']}}
                </td>
                <td>{{$key['model']}}</td>
                <td>
                  <a class="btn btn-primary" href="{{route('vehicle.ShowHistory', $key['vehicle_id'])}}">Historial</a>
                  <a class="btn btn-success" href="{{route('worksheet.create', $key->vehicle_id )}}">Nueva hoja</a>
                </td>
            </tr>
            @empty
            <tr>
                <td>No hubieron coincidencias</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
@section('script')
@endsection
