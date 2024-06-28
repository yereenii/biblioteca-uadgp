@extends('adminlte::page')

@section('title', __('Show').' Usuario')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $user->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Paterno:</strong>
                                    {{ $user->apellido_paterno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Materno:</strong>
                                    {{ $user->apellido_materno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    {{ $user->email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo de Cuenta:</strong>
                                    @if($user->roles->isNotEmpty())
                                        {{ $user->roles->first()->name }}
                                    @else
                                        Sin Rol
                                    @endif
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
