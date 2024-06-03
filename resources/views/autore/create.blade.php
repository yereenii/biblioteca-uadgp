@extends('adminlte::page')


@section('title',  __('Create').' Autor')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"> {{ __('Create') }} Autor</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('autores.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('autore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
