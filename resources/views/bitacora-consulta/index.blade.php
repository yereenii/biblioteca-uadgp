@extends('layouts.app')

@section('template_title')
    Bitacora Consultas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bitacora Consultas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('bitacora-consultas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
									<th >Usuario Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bitacoraConsultas as $bitacoraConsulta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $bitacoraConsulta->documento_id }}</td>
										<td >{{ $bitacoraConsulta->usuario_id }}</td>

                                            <td>
                                                <form action="{{ route('bitacora-consultas.destroy', $bitacoraConsulta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bitacora-consultas.show', $bitacoraConsulta->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bitacora-consultas.edit', $bitacoraConsulta->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $bitacoraConsultas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
