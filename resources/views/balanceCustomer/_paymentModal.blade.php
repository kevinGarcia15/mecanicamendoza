<div class="modal fade bd-example-modal-sm" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">
                    Abono
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createPayment" action="{{route('balance.payment')}}" method="POST">
                    @csrf
                    <input type="hidden" name="client_id" value="{{$listBalanceWorksheet[0]['client_id']}}">
                    <input type="hidden" name="active" value="0">

                    <div class="form-group">
                        <h5 class="modal-title">
                          <input type="hidden" id="total_balance" name="total_balance" value="{{$listBalanceWorksheet[0]['total_balance']}}">
                            Deuda total: <strong>Q.{{$listBalanceWorksheet[0]['total_balance']}}</strong>
                        </h5>
                        <hr>
                        <label for="recipient-name" class="col-form-label ml-auto">
                            Abono
                        </label>
                        <input
                          type="number"
                          step="any"
                          min="0"
                          max="{{$listBalanceWorksheet[0]['total_balance']}}"
                          class="form-control"
                          id="pasive"
                          name="pasive"
                          required
                          value="">
                        {!! $errors->first('pasive', '<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')!!}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary" name="guardar" value="Guardar">
                            Abonar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
