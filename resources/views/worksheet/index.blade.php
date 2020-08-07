@extends('layouts.app')
@section('script')
  <script src="{{asset('js/sweetalert2.min.js')}}"></script>
  <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}" id="theme-styles">
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
            <img class="img-fluid mb-4 rounded" src="{{ asset('img/worksheets_list.jpg') }}" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Hojas de trabajo</h1>
            <p class="lead text-secondary">Aqui se listaran todas las hojas de trabajo ordenado en base al ultimo agragado.
            </p>
            <p class="lead text-secondary">Puede ver el detalle de las hojas de trabajo pulsando en "Detalles"</p>
        </div>
    </div>
    <div class="table-responsive">
      <table class="table" id="worksheetTable">
        <thead>
            <tr>
                <th scope="col">Ingresó</th>
                <th scope="col">Codigo</th>
                <th scope="col">Vehiculo</th>
                <th scope="col">Estado</th>
                <th scope="col">Progreso</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listworksheet as $key)
              @php
                if ($key['statusWorksheet'] == 0) {
                  $status = 'Congelado';
                  $alert = 'alert alert-secondary';
                }elseif ($key['statusWorksheet'] == 1) {
                  $alert = 'alert alert-warning';
                  $status = 'En progreso';
                }else {
                  $status = 'Terminado';
                  $alert = 'alert alert-success';
                }
              @endphp
            <tr>
                <th scope="row">{{$key['workSheetCreated_at']->format('d-m-y')}}</th>
                <th scope="row">{{$key['code']}}</th>
                <td>
                    {{$key['brand_name'].' '.$key['line_name'].' '
                    .$key['color_name'].' Placa '.strtoupper($key['plateNumber'])}}
                </td>
                <th
                  class="{{$alert}}"
                  scope="row">{{$status}}
                  <p class="text-body my-0">Responsable: {{$key['name']}}</p>
                  <p class="text-black-50 my-0">{{$key['workSheetUpdated_at']->diffForHumans()}}</p>
                </th>

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
                      if ($totalWorksToDo > 0) {
                        $percent = (100 * $totalWorksFinish) / $totalWorksToDo;
                      }else {
                        $percent = 0;
                      }
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
                    {{round($percent).'%'}}
                    <!----------------------------------------------------------------------------->
                </td>
                <td>
                  <div class="d-flex">
                    <a class="btn btn-primary mx-1" href="{{route('worksheet.show', $key['worksheet_id'])}}">Detalles</a>
                    @if ($key['statusWorksheet'] == 1 ||$key['statusWorksheet'] == 2)
                      <button class="btn btn-danger btn_delete ">
                        <input type="hidden"  value="{{$key['worksheet_id']}}">
                        Eliminar
                      </button>
                    @endif
                  </div>
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
    <form id="delete_worksheet" method="post">
      @csrf
      @method('DELETE')
    </form>
</div>

@endsection
@section('scriptFooter')
  <script type="text/javascript">
  $(document).ready(function() {
      $('#worksheetTable').DataTable({
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
        "order": [[ 0, 'desc' ]],
      });

      $(".btn_delete").click(function(){
        var worksheet_id = $(this).children().eq(0).val()
        Swal.fire({
          title: '¿Está seguro?',
          text: "No podrá revertir esta acción",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
          if (result.value) {
            $("#delete_worksheet").attr('action', 'worksheet/'+worksheet_id+'').submit()
          }
        })
      })
  });
  </script>
@endsection
