<div class="row">
    <div class="col-12 col-sm-10 col-lg-9 mx-auto">
        <h3 class="display-5 text-primary">Vehículo: {{$workSheetDetail[0]['brand_name'].
          ' '.$workSheetDetail[0]['line_name']}}</h3>
        <hr>
        <div class="d-flex justify-content-between">
            <div class="col-6">
              <span>No. placas</span><br><br>
              <span>Modelo</span><br><br>
              <span>Color</span><br><br>
              <span>Mecanico responsable</span><br><br>
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
