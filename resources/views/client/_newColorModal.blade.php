<div class="modal fade" id="newColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Ingresar nuevo color
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="newColor" action="{{route('color.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">
                            Ingrese el color
                        </label>
                        <input type="text" required class="form-control" id="color" name="color_name" value="{{old('color_name')}}">
                        {!! $errors->first('color_name', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary" name="saveColor" value="Guardar">
                            Guardar
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
