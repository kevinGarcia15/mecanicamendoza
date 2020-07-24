<div class="col-12 col-sm-10 col-lg-9 mx-auto">
    <h2 class="display-5 text-primary">Tareas creadas</h2>
</div>
<hr>
<div class="">
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-9 mx-auto">
            <div class="form-group">
                <ul class="list-group">
                    @forelse ($workToDo as $key)
                    @if ($key->statusWork == 1)
                    <li class="list-group-item">
                        <img
                          src="{{asset('img/warning.png')}}"
                          alt="warning"
                          title="Tarea en progreso">
                        {{$key->description}}
                    </li>
                    @else
                    <li class="list-group-item">
                        <img
                          src="{{asset('img/checked.png')}}"
                          alt="success"
                          title="Tarea terminada">
                        {{$key->description}}
                    </li>
                    @endif

                    @empty
                    <li class="list-group-item">Lista vacia</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
