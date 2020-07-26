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
    </tr>
  @empty
    <tr>
      <td>Lista vacia</td>
    </tr>
  @endforelse
</tbody>
