@extends('layouts.app')
@section('script')
<script src="{{asset('js/sweetalert2.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}" id="theme-styles">
@endsection
@section('content')
<div class="container">
    <div class="bg-white py-3 px-4 my-3 shadow rounded">
        <form action="{{route('client.store')}}" method="post">
          @csrf
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-3 pt-0">Seleccione al cliente</legend>
                    <div class="col-sm-6">
                          @foreach ($optionsAbailable as $key)
                            <div class="form-check">
                              <input type="hidden" name="id_vehicleExist" value="{{$key->vehicle_id}}">
                              <input type="hidden" name="user_id" value="">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="id_clientExist"
                                id="{{$key->client_id}}"
                                value="{{$key->client_id}}"
                                checked>
                              <label class="form-check-label" for="{{$key->client_id}}">
                                {{$key->first_name.' '.$key->last_name.',Telefono: '.$key->phone}}
                              </label>
                            </div>
                          @endforeach
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Siguiente</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
