<div class="row">
    <div class="col-12 col-sm-10 col-lg-9 mx-auto">
        <h2 class="display-5 text-primary">Datos del cliente</h2>
        <a href="{{route('balance.show', $workSheetDetail[0]['client_id'] )}}">
          Ir a la cuenta del cliente
        </a>
        <hr>
        <div class="d-flex justify-content-between">
          <div class="col-6">
            @php
              $titles = ['Nombre', 'Apellido','Teléfono','Dirección'];
            @endphp
            @for ($i=0; $i < 4; $i++)
              <span><strong>{{$titles[$i]}}</strong></span><br><br>
            @endfor
          </div>
          <div class="col-6">
            <p class="lead text-secondary">{{$workSheetDetail[0]['first_name']}}</p>
            <p class="lead text-secondary">{{$workSheetDetail[0]['last_name']}}</p>
            <p class="lead text-secondary">{{$workSheetDetail[0]['phone']}}</p>
            <p class="lead text-secondary">{{$workSheetDetail[0]['address']}}</p>
          </div>
        </div>


    </div>
</div>
