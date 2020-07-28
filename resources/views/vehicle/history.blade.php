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
      <div class="card" style="width: 100%">
        <div class="card-body">
          <h5 class="card-title">{{$key->workSheetUpdated_at->diffForHumans()}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">Tareas realizadas</h6>
          @forelse ($workToDo as $a)
            @if ($a->worksheet_id == $key->worksheet_id)
              <p class="card-text">
                {{$a->description}}
              </p>
            @endif
          @empty
            <p>Lista vacia</p>
          @endforelse
          <a href="{{route('worksheet.show', $key['worksheet_id'])}}" class="card-link">Ver mas</a>
        </div>
      </div>
    @empty

    @endforelse
</div>
@endsection
@section('script')
@endsection
