<div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <h3 class="display-5 text-primary">Datos del vehículo</h3>
        <hr>
        <div class="d-flex justify-content-between">
            <span>Información del vehículo</span>
            <div class="form-group">
                <input
                  class="form-control my-2 {{$errors->first('plateNumber','is-invalid')}}"
                  type="text"
                  min="6"
                  max="6"
                  name="plateNumber"
                  required
                  value="{{old('plateNumber')}}"
                  placeholder="No. de placa..">
                  {!! $errors->first('plateNumber', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                  <select
                    class="form-control my-2 {{$errors->first('brand','is-invalid')}}"
                    name="brand"
                    required>
                    <option value="">Marca</option>
                    <option value="4">Toyota</option>

                  </select>
                  {!! $errors->first('brand', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                  <select
                    class="form-control my-2 {{$errors->first('model_id','is-invalid')}}"
                    name="model_id"
                    required>
                    <option value="">Modelo</option>
                    <option value="1">Corolla</option>
                  </select>
                  {!! $errors->first('model_id', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                  <select
                    class="form-control my-2 {{$errors->first('color_id','is-invalid')}}"
                    name="color_id"
                    required>
                    <option value="">Color</option>
                    <option value="1">Blanco</option>
                  </select>
                  {!! $errors->first('color_id', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                  <input
                    class="form-control my-2"
                    type="text"
                    name="line"
                    value="{{old('line')}}"
                    placeholder="Linea..">
                    {!! $errors->first('line', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

            </div>
        </div>
        <div class="d-flex justify-content-between">
            <span>Responsable</span>
            <div class="form-group">
              <select
                class="form-control my-2 {{$errors->first('MecanicResponsable','is-invalid')}}"
                name="MecanicResponsable"
                required>
                <option value="">Seleccionar</option>
                <option value="1">Pedro perez</option>
              </select>
              {!! $errors->first('MecanicResponsable', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
            </div>
        </div>
    </div>
</div>
