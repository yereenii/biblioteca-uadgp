@extends('adminlte::page')

@section('template_title')
    {{ $palabrasClaveDocumento->name ?? __('Show') . " " . __('Palabras Clave Documento') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Palabras Clave Documento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('palabras-clave-documentos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Documento Id:</strong>
                                    {{ $palabrasClaveDocumento->documento_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Palabra Clave Id:</strong>
                                    {{ $palabrasClaveDocumento->palabra_clave_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
