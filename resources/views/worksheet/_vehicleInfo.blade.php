<div class="row">
    <div class="col-12 col-sm-10 col-lg-9 mx-auto">
        <h3 class="display-5 text-primary">Vehículo: {{$workSheetDetail[0]['brand_name'].
          ' '.$workSheetDetail[0]['line_name']}}</h3>
          <a href="{{route('vehicle.ShowHistory', $workSheetDetail[0]['vehicle_id'])}}">
            Ir al historial
          </a>
        <hr>
        <div class="d-flex justify-content-between">
            <div class="col-6">
              @php
                $titlesVehicle = ['No. placas', 'Modelo','Color','Mecanico responsable'];
              @endphp
              @for ($i=0; $i < 4; $i++)
                <span><strong>{{$titlesVehicle[$i]}}</strong></span><br><br>
              @endfor
            </div>
            <div class="col-6">
              <p class="lead text-secondary">{{strtoupper($workSheetDetail[0]['plateNumber'])}}</p>
              <p class="lead text-secondary">{{$workSheetDetail[0]['model']}}</p>
              <p class="lead text-secondary">{{$workSheetDetail[0]['color_name']}}</p>
              <p class="lead text-secondary">{{$workSheetDetail[0]['name']}}</p>
            </div>
        </div>
    </div>
</div>
