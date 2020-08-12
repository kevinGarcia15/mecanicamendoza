<div class="row">
    <div class="col-12 col-sm-12 col-xs-12 col-lg-2 col-xl-2 my-1">
      <span>Cantidad</span>
    </div>
    <div class="col-12 col-sm-12 col-xs-12 col-lg-7 col-xl-7 my-1">
      <span>Descripción</span>
    </div>
    <div class="col-12 col-sm-12 col-xs-12 col-lg-3 col-xl-3 my-1" >
      <span>Precio unidad</span>
    </div>
</div>

<div class="row" id="addRowReplacement">
    <div class="col-12 col-sm-12 col-xs-12 col-lg-2 col-xl-2 my-1">
        <input type="hidden" name="worksheet_id" value="{{$workSheetDetail[0]['worksheet_id']}}">
        <input
          type="number"
          required
          min="1"
          class="form-control"
          id="quantity"
          name="quantity[]"
          value="1">
        {!! $errors->first('quantity[]', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
    </div>
    <div class="col-12 col-sm-12 col-xs-12 col-lg-7 col-xl-7 my-1">
        <input
          type="text"
          required
          class="form-control"
          name="description[]"
          value="{{old('description[]')}}"
          placeholder="Descripción del producto.."
          >
        {!! $errors->first('description[]', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
    </div>
    <div class="col-12 col-sm-12 col-xs-12 col-lg-3 col-xl-3 my-1" >
        <input
          type="number"
          required
          step="any"
          min="0"
          class="form-control"
          name="price[]"
          value="0"
          id="price"
          >
        {!! $errors->first('price[]', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
    </div>
</div>

<div class="d-flex">
    <div class="col-9 col-sm-10 col-lg-11">

    </div>
    <div class="col-3 col-sm-2 col-lg-2 mx-2">
        <button type="button" id="BtnaddRowReplacement" class="btn btn-primary">
            <span class="material-icons">
                add
            </span>
        </button>
    </div>
</div>
