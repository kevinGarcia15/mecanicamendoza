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
                <th scope="col">Codigo</th>
                <th scope="col">Vehiculo</th>
                <th scope="col">Progreso</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listworksheet as $key)
            <tr>
                <th scope="row">{{$key['code']}}</th>
                <td>
                    {{$key['brand_name'].' '.$key['model_name'].' '
                    .$key['color_name'].' Placa '.strtoupper($key['plateNumber'])}}
                </td>
                <td>
                    <!--calculos para obtener el porcentaje de tareas terminadas------------------->
                    @php
                    $totalWorksToDo = 0;
                    $totalWorksFinish = 0;
                    @endphp
                    @foreach ($work_to_do as $a)
                    @php
                    //compara llaves primaria y foranea
                    if ($a['worksheet_id'] == $key['worksheet_id']) {
                    $totalWorksToDo = $totalWorksToDo + 1;
                    }
                    //obtiene todos los valores en 0 o terminado
                    if ($a['worksheet_id'] == $key['worksheet_id'] && $a['statusWork'] == 0) {
                    $totalWorksFinish = $totalWorksFinish+1;
                    }

                    @endphp
                    @endforeach
                    @php
                    $percent = (100 * $totalWorksFinish) / $totalWorksToDo;
                    @endphp
                    <div class="progress">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: {{$percent.'%'}}"
                          aria-valuenow="{{$percent}}"
                          aria-valuemin="0"
                          aria-valuemax="100">
                        </div>
                    </div>
                    {{$percent.'%'}}
                    <!----------------------------------------------------------------------------->
                </td>
                <td> <a href="{{route('worksheet.show', $key['worksheet_id'])}}">Detalles</a> </td>
            </tr>
            @empty
            <tr>
                <td>Listado vacio</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{$listworksheet->links()}}
</div>

@endsection
@section('script')
@endsection
