@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="{{ asset('img/worksheets_list.svg') }}" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Hojas de trabajo</h1>
            <p class="lead text-secondary">Aqui se listaran todas las hojas de trabajo ordenado en base al ultimo agragado.
            </p>
            <p class="lead text-secondary">Puede ver el detalle de las hojas de trabajo pulsando en "Detalles"</p>
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
            @forelse ($vehicleList as $key)
            <tr>
                <td>{{strtoupper($key['plateNumber'])}}</td>
                <td>
                    {{$key['brand_name'].' '.$key['line_name'].' '
                    .$key['color_name']}}
                </td>
                <td>{{$key['model']}}</td>
                <td> <a href="{{route('vehicle.ShowHistory', $key['vehicle_id'])}}">Historial</a> </td>
            </tr>
            @empty
            <tr>
                <td>Listado vacio</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{$vehicleList->links()}}
</div>

@endsection
@section('script')
@endsection
