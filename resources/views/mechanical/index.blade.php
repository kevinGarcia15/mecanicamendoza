@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="{{ asset('img/worksheets_list.svg') }}" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Mis tareas</h1>
            <p class="lead text-secondary">Aqui se listaran todas las hojas
              de trabajo asignados a {{ Auth::user()->name }}.
            </p>
            <p class="lead text-secondary">Puede ver el detalle de las
              hojas de trabajo pulsando en "Detalles"
            </p>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Vehiculo</th>
                <th scope="col">Status</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listworksheet as $key)
            <tr>
                <td>{{$key->code}}</td>
                <td>{{$key->brand_name.' '.$key->line_name.' '.$key->color_name.
                  ' Placa: '.strtoupper($key->plateNumber)}}
                </td>
                <td>En progreso</td>
                <td><a href="{{route('mechanical.show', $key['worksheet_id'])}}">Detalles</a> </td>
            </tr>
            @empty

            @endforelse
            <tr>
            </tr>
        </tbody>
    </table>
</div>

@endsection
@section('script')
@endsection
