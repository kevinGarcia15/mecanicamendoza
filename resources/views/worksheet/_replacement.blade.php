<div class="row">
    <div class="col-12 col-sm-10 col-lg-9 mx-auto">
        <h2 class="display-5 text-primary">Repuestos y lubricantes</h2>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
              @php
                $total = 0;
              @endphp
              @forelse ($remplacement as $key)
                @php
                $total = $total + $key->price;
                @endphp
                <tr>
                  <td>{{$key->quantity}}</td>
                  <td>{{$key->description}}</td>
                  <td>Q.{{$key->price}}</td>
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
            Total: Q.{{$total}}.00
        </div>
    </div>
</div>
