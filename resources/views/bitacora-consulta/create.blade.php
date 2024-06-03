@extends('adminlte::page')

@section('template_title')
    {{ __('Create') }} Bitacora Consulta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Bitacora Consulta</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('bitacora-consultas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('bitacora-consulta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
