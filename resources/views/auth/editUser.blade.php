@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('userUpdate.update', $user) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name"
                                  type="text"
                                  class="form-control
                                  @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name', $user->name) }}"
                                    required
                                    autocomplete="name"
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input
                                  id="email"
                                  type="email"
                                  class="form-control
                                  @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email', $user->email) }}"
                                    required
                                    autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">Seleccione un rol</label>

                          <div class="col-md-6">
                            <select class="custom-select" name="rol" required>
                              <option
                              value="{{$user->rol}}"
                              {{$user->rol == $user->rol ? 'selected': ''}}
                              >
                              {{$user->rol}}
                              </option>
                              <option value="Master">Master</option>
                              <option value="Mecanico">Mecanico</option>
                              <option value="Administrador">Administrador</option>
                            </select>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
