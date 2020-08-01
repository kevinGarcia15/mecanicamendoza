@extends('layouts.app')

@section('content')
<div class="container">
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
      <h3 class="display-5 text-primary">Balance de saldos</h3>
      <span>Cliente:
        <strong>{{$listBalanceWorksheet[0]['first_name'].' '
          .$listBalanceWorksheet[0]['last_name']}}
        </strong>
      </span><br>
      <span>Teléfono:
        <strong>{{$listBalanceWorksheet[0]['phone']}}
        </strong>
      </span><br>
      <span>Dirección:
        <strong>{{$listBalanceWorksheet[0]['address']}}
        </strong>
      </span><br>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Descripción</th>
                <th scope="col">Deuda</th>
                <th scope="col">Abono</th>
                <th scope="col">Saldo</th>
            </tr>
        </thead>
        <tbody>
          @forelse ($listBalanceWorksheet as $key)
            <tr>
              <td>{{$key->workSheetUpdated_at->format('d/m/y')}}</td>
              @if ($key->active == 0)
                <td>Abono</td>
              @else
                <td>
                  {{$key->brand_name.' '.$key->line_name
                    .' '.$key->model.' Placa: '.strtoupper($key->plateNumber)}}
                </td>
              @endif
              <td>{{'Q.'.$key->active}}</td>
              <td>{{'Q.'.$key->pasive}}</td>
              <td>{{'Q.'.$key->balance}}</td>
            </tr>
          @empty
            <tr>
              <td>lista vacia</td>
            </tr>
          @endforelse
          <tr>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <th scope="row">Saldo Total:</th>
            <th scope="row">{{'Q.'.$key->balance}}</th>
          </tr>
        </tbody>
    </table>

    @if ($listBalanceWorksheet[0]['total_balance'] != 0)
      @include('balanceCustomer/_paymentModal')
      <div class="bg-white py-3 px-4 my-3 shadow rounded">
        <div class="row">
          <div class="col-12 col-lg-7 mx-auto my-2">
            <button
            type="button"
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#payment"
            data-whatever="@mdo"
            >
            Abonar a deuda
          </button>
        </div>
      </div>
    </div>
    @endif
</div>
@endsection
@section('script')

@endsection
