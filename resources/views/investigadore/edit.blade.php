@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Investigadore
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Investigadore</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('investigadores.update', $investigadore->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('investigadore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
