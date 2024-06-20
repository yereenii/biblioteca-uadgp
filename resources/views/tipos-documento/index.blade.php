@extends('adminlte::page')

@section('template_title')
    Tipos Documentos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tipos Documentos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tipos-documentos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        @if ($tiposDocumentos -> isEmpty())
                            <p style="text-align: center; vertical-align: middle">{{__('No hay tipos de documento para mostrar.') }}</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            
                                        <th >Descripcion</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tiposDocumentos as $tiposDocumento)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                
                                            <td >{{ $tiposDocumento->descripcion }}</td>

                                                <td>
                                                    <form action="{{ route('tipos-documentos.destroy', $tiposDocumento->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('tipos-documentos.show', $tiposDocumento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('tipos-documentos.edit', $tiposDocumento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
                {!! $tiposDocumentos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
