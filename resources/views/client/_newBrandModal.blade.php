<div class="modal fade" id="newBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Ingresar nueva marca de vehículo
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="newBrand" action="{{route('brand.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">
                            Ingrese la marca
                        </label>
                        <input type="text" required class="form-control" id="brand" name="brand_name" value="{{old('brand_name')}}">
                        {!! $errors->first('brand_name', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary" name="saveBrand" value="Guardar">
                            Guardar
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
