@extends('layouts.app')
@section('script')
  <!--datatables-->
  <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
  <script src="{{asset('js/datatables.js')}}" defer charset="utf-8"></script>
  <script src="{{asset('js/datatables.min.js')}}" defer charset="utf-8"></script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="{{ asset('img/works_history.jpg') }}" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Historial de vehículos</h1>
            <p class="lead text-secondary">Aquí se listarán todos los vehículos.
              Puedes ver el detalle de los trabajos que se le han realizado pulsando “Historial”
            </p>
        </div>
    </div>
    <table class="table" id="example">
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
                <td class="d-flex">
                  <a class="btn btn-primary mx-1" href="{{route('vehicle.ShowHistory', $key->vehicle_id)}}">Historial</a>
                  <a class="btn btn-outline-info" href="{{route('vehicle.edit', $key->vehicle_id )}}">Editar</a>
                </td>
            </tr>
            @empty
            <tr>
                <td>Listado vacio</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
@section('scriptFooter')
  <script type="text/javascript">
  $(document).ready(function() {
      $('#example').DataTable({
        "language": {
    					"lengthMenu": "_MENU_",
    					"zeroRecords": "Ningún registro",
    					"searchPlaceholder": "Buscar",
    					"info": "_TOTAL_ registro(s)",
    					"infoEmpty": "Ningun registro",
    					"infoFiltered": "(Busqueda en _MAX_ registros)",
    					"search": "",
    					"paginate": {
    							"first": "Primero",
    							"last": "Último",
    							"next": "Siguiente",
    							"previous": "Anterior"
    					},
    			},
      });
  });
  </script>
@endsection
