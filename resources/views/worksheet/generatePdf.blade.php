<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
</head>
<style media="screen">
    body {
        margin: 0px 15px;
    }

    .header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .imageHead {
        width: 300px;
        margin-left: 30%;
        border-radius: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
    caption{
      caption-side: top;
    }
    .align-td {
      text-align: center;
    }
    .userAndCarInfo {
        display: flex;
        margin-bottom: 0px;
        margin-top: 0px;
        border: 5px solid;
    }

    .client {
        width: 30%;
        height: 50px;
    }

    .vehicle {
        width: 30%;
        margin-left: 40%;
        height: 50px;
    }

    .user {
        width: 30%;
        margin-left: 65%;
        height: 50px;
    }

    .total {
        margin-left: 77%;
    }

    #date {
        margin-left: 80%;
    }
    .works{
      margin-top: 0px;
      margin-bottom: 0px;
    }
</style>

<body>
    <div class="title">
        <span>Código: <strong>{{$workSheetDetail[0]['code']}}</strong> </span>
        <span id="date">fecha: {{date("d").'/'.date("m").'/'.date("Y")}}</span>
    </div>
    <div class="header">
        <div class="img">
            <img class="imageHead" src="{{asset('img/logoMecanicaMendoza.jpeg')}}" alt="logo">
        </div>
    </div><br><br>
    <div class="userAndCarInfo">
        <div class="client">
          <strong>Datos del cliente</strong>
            <div class="">
                <strong>Nombre:</strong>
                {{$workSheetDetail[0]['first_name']}}
            </div>
            <div class="">
                <strong>Apellido:</strong>
                {{$workSheetDetail[0]['last_name']}}
            </div>
            <div class="">
                <strong>Teléfono:</strong>
                {{$workSheetDetail[0]['phone']}}
            </div>
            <div class="">
                <strong>Dirección:</strong>
                {{$workSheetDetail[0]['address']}}
            </div>
        </div>
        <div class="vehicle">
          <strong>Datos del vehículo</strong>
            <div class="">
                <strong>Marca:</strong>
                {{$workSheetDetail[0]['brand_name']}}
            </div>
            <div class="">
                <strong>Línea:</strong>
                {{$workSheetDetail[0]['line_name']}}
            </div>
            <div class="">
                <strong>No. placa:</strong>
                {{strtoupper($workSheetDetail[0]['plateNumber'])}}
            </div>
            <div class="">
                <strong>Modelo:</strong>
                {{$workSheetDetail[0]['model']}}
            </div>
            <div class="">
                <strong>Color:</strong>
                {{$workSheetDetail[0]['color_name']}}
            </div>
        </div>
        <div class="user">
            <div class="">
                <strong>Mecánico:</strong>
                {{$workSheetDetail[0]['name']}}
            </div>
        </div>
    </div>

      <table border="2">
        <thead>
          <tr>
            <th scope="col">Trabajos realizados</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($workToDo as $key)
            @if ($key->statusWork != 1)
              <tr>
                <td>{{$key->description}}</td>
              </tr>
            @endif
          </tbody>
        @empty
        @endforelse
      </table>
      <br>

    <div class="remplacement">
        <table border="2">
          <caption><strong>Repuestos y Lubricantes</strong></caption>
            <thead>
                <tr>
                    <th style="width:15%">Cantidad</th>
                    <th scope="col">Descripción</th>
                    <th style="width:15%"></th>
                </tr>
            </thead>
            <tbody>
                @php
                $total = 0;
                @endphp
                @forelse ($remplacement as $key)
                @php
                $total = $total + ($key->price * $key->quantity);
                @endphp
                <tr>
                    <td class="align-td">{{$key->quantity}}</td>
                    <td>{{$key->description.' Q.'.$key->price.'c/u'}}</td>
                    <td class="align-td">Q.{{$key->price * $key->quantity}}</td>
                </tr>
                @empty
                <tr>
                    <td>Lista vacia</td>
                </tr>
                @endforelse
                <tr>
                  <th>-</td>
                  <th>Sub-Total</td>
                  <th>Q.{{number_format($total)}}</td>
                </tr>
            </tbody>
        </table>
    </div><br>
    @if ($workSheetDetail[0]['statusWorksheet'] != 1)
      @php
        $totalWithDisconts =
          ($total + $balanceCustomer[0]['otherExpenses'])-
          ($balanceCustomer[0]['discont'] + $balanceCustomer[0]['pasive']);
      @endphp

      <div class="d-flex-column">
          <div class="col-8">
            <strong>Detalle de movimiento</strong>
          </div>
          <div class="col-4">
            Sub-Total------Q.{{number_format($total)}}
          </div>
          <div class="col-4">
            Descuento----{{'<Q.'.$balanceCustomer[0]['discont'].'>'}}
          </div>

          <div class="col-4">
            Otros recargos Q.{{$balanceCustomer[0]['otherExpenses']}}
          </div>

          <div class="col-4">
            Total----------
            <strong>
              Q.{{number_format(($total+$balanceCustomer[0]['otherExpenses'])-
                $balanceCustomer[0]['discont'])}}
              </strong>
          </div>

          <div class="col-4">
            Abono inicial {{'<Q.'.$balanceCustomer[0]['pasive'].'>'}}
          </div>
          <div class="col-4">
            Saldo------------<strong>Q.{{number_format($totalWithDisconts)}}</strong>
          </div>
      </div>
    @endif
</body>

</html>
