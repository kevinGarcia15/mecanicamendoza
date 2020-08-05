@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{route('client.update', $client)}}" method="post">
      @csrf
      @method('PATCH')
      <div class="bg-white py-3 px-4 my-3 shadow rounded">
          @include('client/_editClientForm')
      </div>
      <div class="bg-white py-3 px-4 my-3 shadow rounded">
          <div class="col-12 col-lg-6 my-2 mx-auto">
              <button
                class="btn btn-success btn-block"
                type="submit"
                name="button">
                Actualizar
              </button>
          </div>
          <div class="col-12 col-lg-6 my-2 mx-auto">
              <a
                class="btn btn-danger btn-block"
                type="button"
                name="button"
                href="{{url('/')}}">
                Cancelar
              </a>
          </div>
      </div>
  </form>
</div>
@endsection
@section('scriptFooter')
<script type="text/javascript" src="{{ asset('js/newClient.js') }}" defer></script>
@endsection
