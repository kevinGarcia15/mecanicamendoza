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
        width: 200px;
        margin-left: 40%;
    }

    table {
        width: 100%;
    }

    .userAndCarInfo {
        display: flex;
        margin: 0 0 0 0;
        border: 5px solid;
    }

    .client {
        width: 30%;
    }

    .vehicle {
        width: 30%;
        margin-left: 40%;
    }

    .user {
        width: 30%;
        margin-left: 65%;
    }

    .total {
        margin-left: 77%;
    }

    #date {
        margin-left: 80%;
    }
</style>

<body>
    <div class="title">
        <span>Código: <strong>{{$workSheetDetail[0]['code']}}</strong> </span>
        <span id="date">fecha: {{date("d").'/'.date("m").'/'.date("Y")}}</span>
    </div>
    <div class="header">
        <div class="img">
            <h1>MECANICA MENDOZA</h1>
            <!--           <img class="imageHead" src="" alt="logo">-->
        </div>
    </div><br><br>
    <div class="userAndCarInfo">
        <div class="client">
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

    <div class="works">
        <table border="1">
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
    </div><br>
    <hr>

    <div class="remplacement">
        <table border="1">
            <thead>
                <tr>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Sub-Total</th>
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
                    <td>{{$key->quantity}}</td>
                    <td>{{$key->description.' Q.'.$key->price.'c/u'}}</td>
                    <td>Q.{{$key->price * $key->quantity}}</td>
                </tr>
                @empty
                <tr>
                    <td>Lista vacia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div><br>
    <div class="total">
        <strong>Total: Q.{{number_format($total)}}</strong>
    </div>
</body>

</html>
