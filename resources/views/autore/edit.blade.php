@extends('adminlte::page')


@section('title', __('Update').' Autor')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{__('Update')}} Autor</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('autores.update', $autore->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('autore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
