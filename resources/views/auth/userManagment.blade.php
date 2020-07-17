@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Gestion de usuarios</h1>
        <a class="btn btn-primary" href="{{ route('register') }}">Nuevo usuario</a>
    </div>
    <ul class="list-group">
        @forelse ($user as $key)
        <li class="list-group-item border-0 mb-3 shadow-sm">
          <div class="d-flex justify-content-between">
              <div>
                <span>
                  {{$key['name'].' -'}}
                </span>
                <span>
                  {{$key['email']}}
                </span>
              </div>
            @if ($key['is_enabled'] == 1)
              <form class=""
                action="{{route('user.update', $key)}}"
                method="post">
                @method('PATCH')
                @csrf
                <input type="hidden" name="changeStatus" value="0">
                <button type="submit" name="button" class="btn btn-danger">Suspender</button>
              </form>
            @else
              <form class=""
                action="{{route('user.update', $key)}}"
                method="post">
                @method('PATCH')
                @csrf
                <input type="hidden" name="changeStatus" value="1">
                <button type="submit" name="button" class="btn btn-success">Activar</button>
              </form>
            @endif
          </div>
        </li>
        @empty
        <li class="list-group-item border-0 mb-3 shadow-sm">
            No hay datos por mostrar
        </li>
        @endforelse
    </ul>
</div>
@endsection
