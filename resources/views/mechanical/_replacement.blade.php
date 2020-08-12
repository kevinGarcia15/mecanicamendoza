@php
  if ($workSheetDetail[0]['statusWorksheet'] == 0 || $workSheetDetail[0]['statusWorksheet'] == 2) {
    $btnHiden = 'btn-hide';
  }else {
    $btnHiden = '';
  }
@endphp
<div class="row">
    <div class="col-12 col-sm-10 col-lg-9 mx-auto">
        <h2 class="display-5 text-primary">Repuestos y lubricantes</h2>
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
          @include('worksheet/_newReplaceModal',['textLabelPrice'=>'Ingrese el precio (opcional)'])
          <br>
        </div>
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
                  <td>{{$key->quantity}}</td>
                  <td>{{$key->description.' Q.'.$key->price.'c/u'}}</td>
                  <td>Q.{{$key->price * $key->quantity}}</td>
                  <td>
                    <form  action="{{route('replacement.destroy', $key->remplacement_id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button
                      class="btn btn-danger {{$btnHiden}}"
                      type="submit">
                      Eliminar
                    </button>
                  </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td>Lista vacia</td>
                </tr>
              @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-10 col-lg-9">
        <div class="d-flex justify-content-end">
            <strong>Total: Q.{{$total}}.00</strong>
        </div>
    </div>
</div>
