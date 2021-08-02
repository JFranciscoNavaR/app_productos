<?php

namespace App\Http\Livewire;

use App\Models\Statu;
use Livewire\Component;

class StatusEdit extends Component
{
    public Statu $statu;
    public $titulo;

    protected $rules = [ 
        'statu.nombre' => 'required|max:50',
    ];

    public function mount($id = null, $ideliminar = null){
        if(is_null($id) && is_null($ideliminar)){
            $this->titulo = "Nuevo Estatus";
            $this->statu = new Statu();
        }elseif(is_null($id)){
            $this->statu = Statu::find($ideliminar);
            $this->statu->delete();
            return redirect()->route('status');
        }else{
            $this->titulo = "Editar Estatus";
            $this->statu = Statu::find($id);
        }
    }

    public function render()
    {
        return view('livewire.status-edit');
    }

    public function guardar(){
        $this->validate();

        $this->statu->save();

        return redirect()->route('status');
    }
}
