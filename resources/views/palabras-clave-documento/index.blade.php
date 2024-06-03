@extends('layouts.app')

@section('template_title')
    Palabras Clave Documentos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Palabras Clave Documentos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('palabras-clave-documentos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Documento Id</th>
									<th >Palabra Clave Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($palabrasClaveDocumentos as $palabrasClaveDocumento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $palabrasClaveDocumento->documento_id }}</td>
										<td >{{ $palabrasClaveDocumento->palabra_clave_id }}</td>

                                            <td>
                                                <form action="{{ route('palabras-clave-documentos.destroy', $palabrasClaveDocumento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('palabras-clave-documentos.show', $palabrasClaveDocumento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('palabras-clave-documentos.edit', $palabrasClaveDocumento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $palabrasClaveDocumentos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
