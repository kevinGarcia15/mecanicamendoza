<div class="bg-white py-3 px-4 my-3 shadow rounded">
    <div class="col-12 col-sm-12 col-lg-12 mx-auto">
        <h2 class="display-5 text-primary">Asignar mecanico</h2>
    </div>
    <hr>
    <form class="" action="{{route('worksheet.update', $vehicleInfo[0]['worksheet_id'])}}" method="post">
      @csrf
      @method('PATCH')
      <div class="row">
        <div class="col-8 col-sm-8 col-lg-4 mx-auto">
          <div class="form-group">
            <select class="form-control my-2 {{$errors->first('user_id','is-invalid')}}" name="user_id">
              <option value="">Seleccionar</option>
              @foreach ($responsable as $key)
                <option value="{{$key['id']}}" {{old('user_id') == $key['id'] ? 'selected': ''}}>
                  {{$key['name']}}
                </option>
              @endforeach
            </select>
            {!! $errors->first('user_id', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
          </div>
        </div>
        <div class="col-8 col-lg-4 my-2 mx-auto">
          <button class="btn btn-primary btn-block" type="submit" name="button">Asignar</button>
        </div>
      </div>
    </form>
</div>
