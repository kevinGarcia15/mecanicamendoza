<div class="col-12 col-sm-12 col-lg-12 mx-auto">
    <h2 class="display-5 text-primary">Tareas creadas</h2>
</div>
<hr>
<div class="">
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12 mx-auto">
            <div class="form-group">
                <ul class="list-group">
                @forelse ($worksCreated as $key)
                    <li class="list-group-item d-flex justify-content-between">{{$key['description']}}
                      <form
                        action="{{route('worktodo.destroy', $key->worktodo_id)}}"
                        method="post">
                          @csrf
                          @method('DELETE')
                        <button class="btn btn-danger">Eliminar</button>
                      </form>
                    </li>
                </ul>
                @empty
                  <li class="list-group-item">Lista vacia</li>
                @endforelse
            </div>
        </div>
    </div>
</div>
