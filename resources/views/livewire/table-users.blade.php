<div class="text-dark">      
    <div class="d-flex flex-row">
        <div class="p-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="folio input-group-text" tabindex="-1">
                        Mostrar:
                    </span>
                </div>
                <select wire:model="perPage" class="form-control">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
            </div>
        </div>
        <div class="p-2">
            <input wire:model.live.debounce.250ms="search" type="text" class="form-control" placeholder="Buscar...">
        </div>
        <div class="p-2">
            <button class="btn btn-outline-info btn-render" wire:click="$refresh" id="render" style="height: 38px"><i class="fas fa-sync"></i></button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-sm table-striped table-hover no-footer" role="grid">
            <thead>
                {{-- Edit: nombres de las columnas  --}}
                <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Tipo de Cuenta</th>
                    <th>Acciones</th>
                </tr>
                {{-- Edit: segundo encabezado de filtros  --}}
            </thead>
            <tbody>
                @foreach ($registros as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                            
                        <td>{{ $user->name.' '.$user->apellido_paterno.' '.$user->apellido_materno }} </td>
                        <td>{{ $user->email }}</td>

                        <td>
                            @if($user->roles->isNotEmpty())
                                {{ $user->roles->first()->name }}
                            @else
                                Sin Rol
                            @endif
                        </td>

                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                <a class="btn btn-sm btn-primary " href="{{ route('users.show', $user->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                <a class="btn btn-sm btn-success" href="{{ route('users.edit', $user->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
    {!! $registros->links() !!}
</div>