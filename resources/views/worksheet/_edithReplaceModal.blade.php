<div class="modal fade" id="edithReplace" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar repuesto
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form
              id="edtihFormReplacement"
              class="bg-white py-3 px-4 shadow rounded"
              method="post">
              @method('PATCH')
              @csrf

            <div class="modal-body">
                <div class="form-group">
                  <input type="hidden" id="editReplacementId"name="remplacement_id" value="">
                    <label for="recipient-name" class="col-form-label">
                        Ingrese la cantidad
                    </label>
                    <input type="number" required class="form-control" id="editQuantity" name="quantity" value="">
                    {!! $errors->first('quantity[]', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                    <label for="recipient-name" class="col-form-label">
                        Descripcion
                    </label>
                    <input type="text" required class="form-control" id="edithDescription" name="description" value="">
                    {!! $errors->first('description[]', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                    <label for="recipient-name" class="col-form-label">
                        precio unitario
                    </label>
                    <input type="number" step="any" min="0" class="form-control" id="edithPrice" name="price" value="">
                    {!! $errors->first('price[]', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="submit" class="btn btn-primary" name="guardar" value="Guardar">
                        Actualizar
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
