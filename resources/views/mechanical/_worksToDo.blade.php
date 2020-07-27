<div class="col-12 col-sm-10 col-lg-9 mx-auto">
    <h2 class="display-5 text-primary">Tareas por cumplir</h2>
</div>
<hr>
<div class="">
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-9 mx-auto">
            <div class="form-group">
                <ul class="list-group">
                    @forelse ($workToDo as $key)
                    @if ($key->statusWork == 1)
                    <li class="list-group-item d-flex justify-content-between">
                      <div class="">
                        <img
                        src="{{asset('img/warning.png')}}"
                        alt="warning"
                        title="Tarea en progreso">
                        {{$key->description}}
                      </div>
                      <div class="buttons">
                        <div class="dropdown show">
                          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Acciones
                          </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @include('worksheet/_statusWork', ['value' => '0', 'btnText' => 'Finalizar tarea'])
                          </div>
                        </div>
                      </div>
                    </li>
                    @else
                      <li class="list-group-item d-flex justify-content-between">
                        <div class="">
                          <img
                          src="{{asset('img/checked.png')}}"
                          alt="success"
                          title="Tarea terminada">
                          {{$key->description}}
                        </div>
                        <div class="buttons">
                          <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Acciones
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              @include('worksheet/_statusWork', ['value' => '1', 'btnText' => 'Cambiar estado'])
                            </div>
                          </div>
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
