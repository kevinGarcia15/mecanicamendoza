<div class="modal fade bd-example-modal-sm" id="freezWorksheet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">
                    Congelar Hoja de trabajo
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadTask" action="{{route('balance.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="worksheet_id" value="{{$workSheetDetail[0]['worksheet_id']}}">
                    <input type="hidden" name="client_id" value="{{$workSheetDetail[0]['client_id']}}">
                    <input type="hidden" id="active" name="active" value="{{$total}}">

                    <div class="form-group">
                        <h5 class="modal-title">
                          <input type="hidden" name="" id="sub_total" value="{{$total}}">
                            Sub-total: <strong>Q.{{$total}}</strong>
                        </h5>
                        <hr>
                        <label for="recipient-name" class="col-form-label ml-auto">
                            Descuento
                        </label>
                        <input
                          type="number"
                          step="any"
                          min="0"
                          class="form-control"
                          id="descont"
                          name="discont"
                          value="0">
                        {!! $errors->first('descont', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                        <label for="recipient-name" class="col-form-label ml-auto">
                            Otros recargos
                        </label>
                        <input
                          type="number"
                          step="any"
                          min="0"
                          class="form-control"
                          id="otherExpenses"
                          name="otherExpenses"
                          value="0">
                        {!! $errors->first('otherExpenses', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                        <br>
                        <h5 class="modal-title">
                            <input type="hidden" id="total" name="" value="">
                            Total: Q.<strong id="totalText"></strong>
                        </h5>

                        <label for="recipient-name" class="col-form-label ml-auto">
                            Abono inicial
                        </label>
                        <input
                          type="number"
                          step="any"
                          min="0"
                          class="form-control"
                          id="pasive"
                          name="pasive"
                          value="0">
                        {!! $errors->first('pasive', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}
                        <br>
                        <h5 class="modal-title">
                          <input type="hidden" id="balance" name="balance" value="{{$total}}">
                            Saldo: Q.<strong id="balanceText"></strong>
                        </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary" name="guardar" value="Guardar">
                            Congelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
