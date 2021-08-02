<?php

namespace App\Http\Livewire;

use App\Models\Statu;
use Livewire\Component;
use Livewire\WithPagination;

class StatusTable extends Component
{
    use WithPagination;

    protected $queryString = ['buscar' => ['except' => '']];
    public $buscar;
    public $titulo;
    public $filtro = 'nombre';
    public $orden = 'ASC';

    public function render()
    {
        $this->titulo = "Estatus";
        $buscarSQL = '%'.$this->buscar.'%';
        $status = Statu::orderby('id', $this->orden)
            ->where($this->filtro,'like',$buscarSQL)
            ->paginate(5); 
        
        return view('livewire.status-table', compact('status'));
    }
}
