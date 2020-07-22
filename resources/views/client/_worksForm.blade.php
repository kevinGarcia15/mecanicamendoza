<div class="col-12 col-sm-12 col-lg-12 mx-auto">
    <h2 class="display-5 text-primary">Crear tareas</h2>
</div>
<hr>
<div class="" id="rowWorks">
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12 mx-auto">
            <div class="form-group">
              <input type="hidden" name="worksheet_id" value="{{$newWorkSheet}}">
                <input
                  class="form-control my-2"
                  type="text"
                  name="description[]"
                  value="{{old('description[]')}}"
                  placeholder="Trabajo.."
                  required>
                {!! $errors->first('description[]', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
            </div>
        </div>
    </div>
</div>
<div class="d-flex">
  <div class="col-9 col-sm-10 col-lg-10">

  </div>
  <div class="col-3 col-sm-2 col-lg-2 mx-2">
    <button
    type="button"
    id="addRow"
    class="btn btn-primary">
    <span class="material-icons">
    add
    </span>
    </button>
</div>
</div>
