<div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <h2 class="display-5 text-primary">Datos del cliente</h2>
        <hr>
        <div class="d-flex justify-content-between">
            <span>Información personal</span>
            <div class="form-group">
                <input
                  class="form-control my-2 {{$errors->first('first_name','is-invalid')}}"
                  type="text"
                  required
                  name="first_name"
                  value="{{old('first_name')}}"
                  placeholder="Nombre..">
                  {!! $errors->first('first_name', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                <input
                  class="form-control  my-2 {{$errors->first('last_name','is-invalid')}}"
                  type="text"
                  required
                  name="last_name"
                  value="{{old('last_name')}}"
                  placeholder="Apellido..">
                  {!! $errors->first('last_name', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <span>Contacto</span>
            <div class="form-group">
                <input
                  class="form-control my-2 {{$errors->first('phone','is-invalid')}}"
                  type="number"
                  min="10000000"
                  max="99999999"
                  name="phone"
                  required
                  value="{{old('phone')}}"
                  placeholder="Teléfono..">
                  {!! $errors->first('phone', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                  <input
                    id="address"
                    required
                    class="form-control my-2 {{$errors->first('address','is-invalid')}}"
                    name="address"
                    rows="8"
                    cols="20"
                    value="{{old('address')}}"
                    placeholder="Dirección">
                  {!! $errors->first('address', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
            </div>
        </div>
    </div>
</div>
