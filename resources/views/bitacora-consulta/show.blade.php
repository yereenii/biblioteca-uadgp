@extends('adminlte::page')

@section('template_title')
    {{ $bitacoraConsulta->name ?? __('Show') . " " . __('Bitacora Consulta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Bitacora Consulta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('bitacora-consultas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Documento Id:</strong>
                                    {{ $bitacoraConsulta->documento_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Usuario Id:</strong>
                                    {{ $bitacoraConsulta->usuario_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
