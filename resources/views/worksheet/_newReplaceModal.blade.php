<div
  class="modal fade"
  id="newReplace"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5
                  class="modal-title"
                  id="exampleModalLabel"
                  >
                  Ingresar repuesto
                </h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadTask" action="{{route('replacement.store')}}" method="POST">
                  @csrf
                  <input type="hidden" name="worksheet_id" value="{{$workSheetDetail[0]['worksheet_id']}}">
                    <div class="form-group">
                        <label
                          for="recipient-name"
                          class="col-form-label"
                          >
                          Ingrese la cantidad
                        </label>
                        <input
                          type="number"
                          required
                          min="1"
                          class="form-control"
                          id="quantity"
                          name="quantity[]"
                          value="1">
                          {!! $errors->first('quantity[]', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                          <label
                            for="recipient-name"
                            class="col-form-label"
                            >
                            Descripcion
                          </label>
                          <input
                            type="text"
                            required
                            class="form-control"
                            id="description"
                            name="description[]"
                            value="{{old('description[]')}}">
                            {!! $errors->first('description[]', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                            <label
                              for="recipient-name"
                              class="col-form-label"
                              >
                              {{$textLabelPrice}}
                            </label>
                            <input
                              type="number"
                              step="any"
                              min="0"
                              class="form-control"
                              id="price"
                              name="price[]"
                              value="0">
                              {!! $errors->first('price[]', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                    </div>
                    <div class="modal-footer">
                        <button
                          type="button"
                          class="btn btn-secondary"
                          data-dismiss="modal"
                          >
                          Cerrar
                        </button>
                        <button
                          type="submit"
                          class="btn btn-primary"
                          name="guardar"
                          value="Guardar"
                          >
                          Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
