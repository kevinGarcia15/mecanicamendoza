@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{route('vehicle.update', $vehicle)}}" method="post">
      @csrf
      @method('PATCH')
      <div class="bg-white py-3 px-4 my-3 shadow rounded">
          @include('vehicle/_vehicleForm')
      </div>
      <div class="bg-white py-3 px-4 my-3 shadow rounded">
          <div class="col-12 col-lg-6 my-2 mx-auto">
              <button
                class="btn btn-success btn-block"
                type="submit"
                name="button">
                Actualizar
              </button>
          </div>
          <div class="col-12 col-lg-6 my-2 mx-auto">
              <a
                class="btn btn-danger btn-block"
                type="button"
                name="button"
                href="{{url('/')}}">
                Cancelar
              </a>
          </div>
      </div>
  </form>
</div>
@endsection
@section('scriptFooter')
<script type="text/javascript">
$(document).ready(function() {
  /*Funcion para hacer una peticion ajax al servidor para el select dinamico*/
  $("#brand_name").on("change", function() {
    console.log('click on my')
    var carBrand = $(this).val();
    if ($.trim(carBrand) != "") {
      //no esta vacio
      $.get(
        "{{route('carLine.show')}}", //ruta de la peticion
        {
          carBrand_id: carBrand //valores a pasar
        },
        function(response) {
          $("#line_name").empty();
          $("#line_name").append('<option value="">Linea</option>');
          $.each(response, function(index, value) {
            $("#line_name").append(
              '<option value="' +
              index +
              '">' +
              value +
              "</option>"
            );
          });
        }
      );
    }
  });

})

</script>
@endsection
