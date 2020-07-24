<div class="row">
    <div class="col-12 col-sm-10 col-lg-9 mx-auto">
        <h2 class="display-5 text-primary">Datos del cliente</h2>
        <hr>
        <div class="d-flex justify-content-between">
          <div class="col-6">
            <span>Nombre</span><br><br>
            <span>Apellido</span><br><br>
            <span>Teléfono</span><br><br>
            <span>Dirección</span><br><br>
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
