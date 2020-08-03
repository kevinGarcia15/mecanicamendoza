@php
  if ($workSheetDetail[0]['statusWorksheet'] == 0) {
    $btnHiden = 'btn-hide';
  }else {
    $btnHiden = '';
  }
@endphp
<div class="col-12 col-sm-10 col-lg-9 mx-auto">
    <h2 class="display-5 text-primary">Tareas creadas</h2>
</div>
<hr>
<div class="">
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-9 mx-auto">
          <div class="col-12 col-lg-6 mx-auto">
            <button
              type="button"
              class="btn btn-primary btn-block {{$btnHiden}}"
              data-toggle="modal"
              data-target="#newTask"
              data-whatever="@mdo"
              >
              Nueva tarea
            </button>
            @include('worksheet/_newTaskModal')
            <br>
          </div>
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
                            @include('worksheet/_changeStatusWork', ['value' => '0', 'btnText' => 'Finalizar tarea'])
                            @include('worksheet/_deleteWork')
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
                        <div class="buttons {{$btnHiden}}">
                          <div class="dropdown show">
                            <a
                              class="btn btn-secondary dropdown-toggle"
                              href="#"
                              role="button"
                              id="dropdownMenuLink"
                              data-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false">
                              Acciones
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              @include('worksheet/_changeStatusWork', ['value' => '1', 'btnText' => 'Cambiar estado'])
                              @include('worksheet/_deleteWork')
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
