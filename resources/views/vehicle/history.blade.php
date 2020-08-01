@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="card-title">Historial {{$vehicleWorksheetHistory[0]['brand_name'].
          ' '.$vehicleWorksheetHistory[0]['line_name'].' '.$vehicleWorksheetHistory[0]['color_name'].
          ' Placa: '.strtoupper($vehicleWorksheetHistory[0]['plateNumber'])}}
        </h3>
    </div>
    @forelse ($vehicleWorksheetHistory as $key)
      @php
        //manejador del estado de la hoja de trabajo
        if ($key->statusWorksheet == 0) {
          $alertHandler = 'alert-light';
          $textHandler = '(Hoja de trabajo finalizada)';
        }else {
          $alertHandler = 'alert-dark';
          $textHandler = '<strong>(Hoja de trabajo en progreso)</strong>';
        }
      @endphp
      <div class="card alert {{$alertHandler}}" style="width: 100%">
        <div class="card-body">
          <h5
            class="card-title">
            Tareas realizadas {!!$textHandler!!}
          </h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$key->workSheetUpdated_at->diffForHumans()}}</h6>
          <ol>
            @forelse ($workToDo as $a)
              @if ($a->worksheet_id == $key->worksheet_id)
                  <li>{{$a->description}}</li>
              @endif
          @empty
            <p>Lista vacia</p>
          @endforelse
        </ol>
          <a href="{{route('worksheet.show', $key['worksheet_id'])}}" class="card-link">Ver mas</a>
        </div>
      </div>
    @empty

    @endforelse
</div>
@endsection
@section('script')
@endsection
