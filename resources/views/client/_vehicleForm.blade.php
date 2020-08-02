<div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <h3 class="display-5 text-primary">Datos del vehículo</h3>
        <hr>
        <div class="d-flex justify-content-between">
            <span>Información del vehículo</span>
            <div class="form-group">
                <input
                  class="form-control my-2 uppercase {{$errors->first('plateNumber','is-invalid')}}"
                  type="text"
                  minlength="7"
                  maxlength="7"
                  name="plateNumber"
                  required
                  value="{{old('plateNumber')}}"
                  placeholder="No. de placa.."
                  id="plateNumber">
                  {!! $errors->first('plateNumber', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
<!--Marca---------------------------------------------------------------------->
                  <div class="row brand_name">
                      <div class="col-8 col-sm-8 col-lg-8">
                          <select
                            class="form-control my-2
                            {{$errors->first('brand','is-invalid')}}"
                            name="brand"
                            id="brand_name"
                            required>
                              <option value="">Marca</option>
                              @foreach ($brand as $key)
                              <option value="{{$key['brand_id']}}">
                                  {{$key['brand_name']}}
                              </option>
                              @endforeach
                          </select>
                          {!! $errors->first('brand', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                      </div>
                      <div class="col-4 col-sm-4 col-lg-4">
                          <a
                            class="btn btn-primary btn-sm my-2"
                            data-toggle="modal"
                            data-target="#newBrand"
                            data-whatever="@mdo">
                            <img style="width: 24px;" src="{{asset('img/plus_icon.png')}}" alt="">
                          </a>
                      </div>
                  </div>

<!--Line---------------------------------------------------------------------->
                <div class="row line_name">
                    <div class="col-8 col-sm-8 col-lg-8">
                      <select
                      class="form-control my-2 {{$errors->first('line_id','is-invalid')}}"
                      name="line_id"
                      id="line_name"
                      required>
                      <option value="">Linea</option>
                    </select>
                    {!! $errors->first('line_id', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                    </div>
                    <div class="col-4 col-sm-4 col-lg-4">
                        <a
                          class="btn btn-primary btn-sm my-2"
                          data-toggle="modal"
                          data-target="#newLine"
                          data-whatever="@mdo">
                          <img style="width: 24px;" src="{{asset('img/plus_icon.png')}}" alt="">
                        </a>
                    </div>
                </div>
<!--Color---------------------------------------------------------------------->
                <div class="row color_name">
                    <div class="col-8 col-sm-8 col-lg-8">
                        <select
                          class="form-control my-2
                          {{$errors->first('color_id','is-invalid')}}"
                          name="color_id"
                          required
                          id="color_name">

                            <option value="">Color</option>
                            @foreach ($color as $key)
                            <option
                              value="{{$key['color_id']}}"
                              {{old('color_id') == $key['color_id'] ? 'selected': ''}}>
                              {{$key['color_name']}}
                            </option>
                            @endforeach
                        </select>
                        {!! $errors->first('color_id', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                    </div>
                    <div class="col-4 col-sm-4 col-lg-4">
                        <a
                          class="btn btn-primary btn-sm my-2"
                          data-toggle="modal"
                          data-target="#newColor"
                          data-whatever="@mdo">
                            <img style="width: 24px;" src="{{asset('img/plus_icon.png')}}" alt="">
                        </a>
                    </div>
                </div>
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
                    value="{{old('model')}}"
                    placeholder="Modelo.."
                    id="model">
                    {!! $errors->first('model', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                    <div id="vehicleInfo">
                    </div>
                    <input type="hidden" id="id_vehicleExist" name="id_vehicleExist" value="0">
            </div>
        </div>
        <div class="" style="display:none">
            <span>Responsable (Puede agregarlo mas tarde)</span>
            <div class="form-group">
              <select
                class="form-control my-2 {{$errors->first('user_id','is-invalid')}}"
                name="user_id"
                >
                <option value="">Seleccionar</option>
                @foreach ($responsable as $key)
                  <option
                    value="{{$key['id']}}"
                    {{old('user_id') == $key['id'] ? 'selected': ''}}
                    >
                    {{$key['name']}}
                  </option>
                 @endforeach
              </select>
              {!! $errors->first('user_id', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
            </div>
        </div>
    </div>
</div>
