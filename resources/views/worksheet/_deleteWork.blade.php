<form
  action="{{route('worktodo.destroy', $key->worktodo_id)}}"
  method="post">
    @csrf
    @method('DELETE')
  <button class="dropdown-item">Eliminar tarea</button>
</form>
