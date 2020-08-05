<div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <h3 class="display-5 text-primary">Editar del vehículo</h3>
        <hr>
        <div class="d-flex justify-content-between">
            <span>Información del vehículo</span>
            <div class="form-group">
                <input
                  class="form-control my-2 uppercase
                  {{$errors->first('plateNumber','is-invalid')}}"
                  type="text"
                  minlength="7"
                  maxlength="7"
                  name="plateNumber"
                  required
                  value="{{old('plateNumber', $vehicle->plateNumber)}}"
                  placeholder="No. de placa.."
                  id="plateNumber">
                {!! $errors->first('plateNumber', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                <!--Marca---------------------------------------------------------------------->
                <select class="form-control my-2
                    {{$errors->first('brand','is-invalid')}}"
                    name="brand"
                    id="brand_name" required>
                    <option value="">Marca</option>
                    @foreach ($brand as $key)
                    <option
                    value="{{$key['brand_id']}}"
                    {{$vehicle->brand_id == $key['brand_id'] ? 'selected': ''}}
                    >
                    {{$key['brand_name']}}
                    </option>
                    @endforeach
                </select>
                {!! $errors->first('brand', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                <!--Line---------------------------------------------------------------------->

                <select
                  class="form-control my-2
                  {{$errors->first('line_id','is-invalid')}}"
                  name="line_id"
                  id="line_name"
                  required>
                    <option value="">Linea</option>
                  @foreach ($line as $key)
                    <option value="{{$key['line_id']}}"
                    {{$vehicle->line_id == $key['line_id'] ? 'selected': ''}}
                    >
                    {{$key['line_name']}}
                    </option>
                  @endforeach
                </select>
                {!! $errors->first('line_id', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                <!--Color---------------------------------------------------------------------->

                <select class="form-control my-2
                    {{$errors->first('color_id','is-invalid')}}" name="color_id" required id="color_name">
                    <option value="">Color</option>
                    @foreach ($color as $key)
                    <option
                      value="{{$key['color_id']}}"
                      {{$vehicle->color_id == $key['color_id'] ? 'selected': ''}}
                      >
                      {{$key['color_name']}}
                    </option>
                    @endforeach
                </select>
                {!! $errors->first('color_id', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                @php
                $maxYearModel = date('Y');
                @endphp
                <input
                  class="form-control my-2"
                  type="number"
                  name="model"
                  min="1900"
                  max="{{$maxYearModel}}"
                  required
                  value="{{old('model', $vehicle->model)}}"
                  placeholder="Modelo.."
                  id="model">
                {!! $errors->first('model', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                <input type="hidden" id="id_vehicleExist" name="id_vehicleExist" value="0">
            </div>
        </div>
    </div>
</div>
