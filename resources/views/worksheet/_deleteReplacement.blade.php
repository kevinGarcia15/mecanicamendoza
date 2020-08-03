
<form action="{{route('replacement.destroy', $key->remplacement_id)}}" method="post">
    @csrf
    @method('DELETE')
    <button class="dropdown-item {{$btnHiden}}" type="submit">
        Eliminar
    </button>
</form>
