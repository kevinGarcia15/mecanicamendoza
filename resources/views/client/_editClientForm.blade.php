<div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <h2 class="display-5 text-primary">Datos del cliente</h2>
        <hr>
        <div class="d-flex justify-content-between">
            <span>Información personal</span>
            <div class="form-group">
              <input
                class="form-control my-2 {{$errors->first('dpi','is-invalid')}}"
                type="text"
                name="dpi"
                id="dpi"
                value="{{old('dpi', $client->dpi)}}"
                placeholder="No. de DPI (Opcional)">
                {!! $errors->first('dpi', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                <input
                  class="form-control my-2 {{$errors->first('first_name','is-invalid')}}"
                  type="text"
                  required
                  name="first_name"
                  value="{{old('first_name', $client->first_name)}}"
                  placeholder="Nombre.."
                  id="first_name">
                  {!! $errors->first('first_name', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                  <div class="" id="FilterName">
                  </div>
                <input
                  class="form-control  my-2 {{$errors->first('last_name','is-invalid')}}"
                  type="text"
                  required
                  name="last_name"
                  value="{{old('last_name', $client->last_name)}}"
                  placeholder="Apellido.."
                  id="last_name">
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
                  value="{{old('phone', $client->phone)}}"
                  placeholder="Teléfono.."
                  id="phone">
                  {!! $errors->first('phone', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                  <input
                    id="address"
                    required
                    class="form-control my-2 {{$errors->first('address','is-invalid')}}"
                    name="address"
                    rows="8"
                    cols="20"
                    value="{{old('address', $client->address)}}"
                    placeholder="Dirección"
                    id="address">
                  {!! $errors->first('address', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
            </div>
            <input type="hidden" id="id_clientExist" name="id_clientExist" value="0">
        </div>
    </div>
</div>
