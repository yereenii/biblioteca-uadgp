@extends('layouts.app')

@section('template_title')
    Documentos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Documentos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('documentos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Autor Id</th>
									<th >Titulo</th>
									<th >Editorial</th>
									<th >Descripcion</th>
									<th >Tipo Documento Id</th>
									<th >Fecha Publicacion</th>
									<th >Archivo Documento</th>
									<th >Portada Documento</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documentos as $documento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $documento->autor_id }}</td>
										<td >{{ $documento->titulo }}</td>
										<td >{{ $documento->editorial }}</td>
										<td >{{ $documento->descripcion }}</td>
										<td >{{ $documento->tipo_documento_id }}</td>
										<td >{{ $documento->fecha_publicacion }}</td>
										<td >{{ $documento->archivo_documento }}</td>
										<td >{{ $documento->portada_documento }}</td>

                                            <td>
                                                <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('documentos.show', $documento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('documentos.edit', $documento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                    </div>
                </div>
                {!! $documentos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
