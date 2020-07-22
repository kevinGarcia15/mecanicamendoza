<div class="col-12 col-sm-10 col-lg-6 mx-auto">
    <h2 class="display-5 text-primary">Trabajos a realizar</h2>
</div>
<hr>
<div class="" id="rowWorks">
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12 mx-auto">
            <div class="form-group">
                <input
                  class="form-control my-2"
                  type="text"
                  name="worksToDo[]"
                  value="{{old('firstName')}}"
                  placeholder="Trabajo..">
                {!! $errors->first('firstName', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
            </div>
        </div>
    </div>
</div>
<div class="d-flex">
  <div class="col-8 col-sm-8 col-lg-10">

  </div>
  <div class="col-4 col-sm-4 col-lg-2">
    <button
    type="button"
    id="addRow"
    class="btn btn-primary btn-block">
    Agregar
  </button>
</div>
</div>
