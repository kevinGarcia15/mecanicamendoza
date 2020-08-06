@php
  if ($workSheetDetail[0]['statusWorksheet'] == 0) {
    $btnHiden = 'btn-hide';
  }else {
    $btnHiden = '';
  }
@endphp

<div class="row">
    <div class="col-12 col-sm-10 col-lg-9 mx-auto">
        <h2 class="display-5 text-primary">Repuestos y Lubricantes</h2>
        <hr>
        <div class="col-12 col-lg-6 mx-auto">
          <button
            type="button"
            class="btn btn-primary btn-block {{$btnHiden}}"
            data-toggle="modal"
            data-target="#newReplace"
            data-whatever="@mdo"
            >
            Ingresar repuesto
          </button>
          @include('worksheet/_newReplaceModal',['textLabelPrice'=>'Ingrese el precio unitario'])
          <br>
        </div>
        <div class="table-responsive-lg">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Cantidad</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Sub-Total</th>
              </tr>
            </thead>
            <tbody>
              @php
              $total = 0;
              @endphp
              @forelse ($remplacement as $key)
                @php
                $total = $total + ($key->price * $key->quantity);
                @endphp
                <tr>
                  <input type="hidden" name="" value="{{$key->quantity}}">
                  <input type="hidden" name="" value="{{$key->description}}">
                  <input type="hidden" name="" value="{{$key->price}}">
                  <input type="hidden" name="" value="{{$key->remplacement_id}}">
                  <td>{{$key->quantity}}</td>
                  <td>{{$key->description.' Q.'.$key->price.'c/u'}}</td>
                  <td>Q.{{$key->price * $key->quantity}}</td>
                  <td>
                    <div class="buttons {{$btnHiden}}">
                      <div class="dropdown show">
                        <a
                        class="btn btn-secondary dropdown-toggle"
                        href=""
                        role="button"
                        id="dropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        Acciones
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <button
                          type="button"
                          class="dropdown-item {{$btnHiden}} editBtn"
                          data-toggle="modal"
                          data-target="#edithReplace"
                          data-whatever="@mdo">
                          Editar
                        </button>
                        @include('worksheet/_deleteReplacement')
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td>Lista vacia</td>
              </tr>

            @endforelse
            <tr>
              <td>--</td>
              <th scope="row">Sub-Total: </th>
              <th scope="row">Q.{{number_format($total)}}</th>
            </tr>
          </tbody>
        </table>

        @if ($workSheetDetail[0]['statusWorksheet'] != 1)
          @php
            $totalWithDisconts =
              ($total + $balanceCustomer[0]['otherExpenses'])-
              ($balanceCustomer[0]['discont'] + $balanceCustomer[0]['pasive']);
          @endphp

          <div class="d-flex-column justify-content-rigth">
            <div class="row">
              <div class="col-8">
                <strong>Detalle de movimiento</strong>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                Sub-Total
              </div>
              <div class="col-4">
                &nbsp&nbspQ.{{number_format($total)}}
              </div>
            </div>

            <div class="row">
              <div class="col-4">
                Descuento
              </div>
              <div class="col-4">
                {{'<Q.'.$balanceCustomer[0]['discont'].'>'}}
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                Otros recargos
              </div>
              <div class="col-4">
                &nbsp&nbspQ.{{$balanceCustomer[0]['otherExpenses']}}
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                Total
              </div>
              <div class="col-4">
                <strong>
                  &nbsp&nbspQ.{{number_format(($total+$balanceCustomer[0]['otherExpenses'])-
                  $balanceCustomer[0]['discont'])}}
                </strong>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                Abono inicial
              </div>
              <div class="col-4">
                {{'<Q.'.$balanceCustomer[0]['pasive'].'>'}}
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                Saldo
              </div>
              <div class="col-4">
                <strong>&nbsp&nbspQ.{{number_format($totalWithDisconts)}}</strong>
              </div>
            </div>
          </div>
        @endif
        </div>
    </div>
</div>

@include('worksheet/_edithReplaceModal')
@include('worksheet/_freezeWorksheetModal')
