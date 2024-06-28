<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class TableUsers extends Component
{
    use WithPagination;
    // variables de la páginación
    public $perPage = 10;
    public $page = 1;

    // Campos de búsquedas filtrables
    public $search = '';

    public function render()
    {
        $query = User::select(
            'id',
            'name', 
            'apellido_paterno',
            'apellido_materno', 
            'email',
        )
        ->when($this->search, function ($param) {
            $param->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('apellido_paterno', 'like', '%' . $this->search . '%')
                ->orWhere('apellido_materno', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        });

        // carga de registros
        $registros = $query->paginate($this->perPage);
        if ($this->page > $registros->lastPage()) { // vuelve a la página 1 si hay pocos registros
            $this->page = 1;
            $registros = $query->paginate($this->perPage, ['*'], 'page', $this->page);
        }

        return view('livewire.table-users', compact('registros'))
        ->with('i',  ($registros->currentPage() - 1) * $registros->perPage());
    }
}
