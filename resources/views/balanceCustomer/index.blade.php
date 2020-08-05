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
            <img class="img-fluid mb-4" src="{{ asset('img/balanceCustomer.svg') }}" alt="Home">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">Clientes deudores</h1>
            <p class="lead text-secondary">Aqui se mostraran los clientes que tiene una deuda con la empresa.
            </p>
            <p class="lead text-secondary">Puede ver el detalle pulsando en "Detalles"</p>
        </div>
    </div>

    <br>
    <div class="table-responsive">
      <table class="table" id="balanceCustomerTable">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Direccion</th>
            <th scope="col">Deuda (GTQ)</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="items">
          @forelse ($balanceCustomer as $key)
            @php
            if ($key->total_balance > 0) {
              $debtorCustomer = 'text-danger';
            }else {
              $debtorCustomer = '';
            }
            @endphp
            <tr>
              <th>{{$key->first_name.' '.$key->last_name}}</th>
              <td>{{$key->phone}}</td>
              <td>{{$key->address}}</td>
              <td class="{{$debtorCustomer}}">{{$key->total_balance}}</td>
              <td class="d-flex">
                <a class="btn btn-primary mx-1" href="{{route('balance.show', $key->client_id )}}">Detalles</a>
                <a class="btn btn-outline-info" href="{{route('client.edit', $key->client_id )}}">Editar</a>
              </td>
            </tr>
          @empty
            <tr>
              <td>Lista vacia</td>
            </tr>
          @endforelse
        </tbody>
      </table>

    </div>
</div>
@endsection
@section('scriptFooter')
  <script type="text/javascript">
  $(document).ready(function() {
      $('#balanceCustomerTable').DataTable({
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
          "order": [[ 3, 'desc' ]],
      });
  });
  </script>
@endsection
