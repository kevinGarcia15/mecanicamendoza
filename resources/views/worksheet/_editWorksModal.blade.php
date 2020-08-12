<div class="modal fade" id="edithWork" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Tarea
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form
              id="edtihFormWork"
              class="bg-white py-3 px-4 shadow rounded"
              method="post">
              @method('PATCH')
              @csrf

            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">
                        Descripcion
                    </label>
                    <input type="text" required class="form-control" id="edithDescriptionWork" name="description" value="">
                    {!! $errors->first('description[]', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

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
