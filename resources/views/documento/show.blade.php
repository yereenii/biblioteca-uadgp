@extends('adminlte::page')

@section('template_title')
    {{ $documento->name ?? __('Show') . " " . __('Documento') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Documento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('documentos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Autor Id:</strong>
                                    {{ $documento->autor_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Titulo:</strong>
                                    {{ $documento->titulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Editorial:</strong>
                                    {{ $documento->editorial }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $documento->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Documento Id:</strong>
                                    {{ $documento->tipo_documento_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Publicacion:</strong>
                                    {{ $documento->fecha_publicacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Archivo Documento:</strong>
                                    {{ $documento->archivo_documento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Portada Documento:</strong>
                                    {{ $documento->portada_documento }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
