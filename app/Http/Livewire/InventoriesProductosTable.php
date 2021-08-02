<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class InventoriesProductosTable extends Component
{
    use WithPagination;

    protected $queryString = ['buscar' => ['except' => '']];
    public $buscar;
    public $filtro = 'id';
    public $orden = 'ASC';
    public $titulo;
    public Inventory $inventory;

    /*public function increment(){$this->count++;}
    public function decrement(){$this->count--;}*/

    public function mount($idver){
        $this->inventory = Inventory::find($idver);
    }

    public function render()
    {
        $this->titulo = "Productos";
        $buscarSQL = '%'.$this->buscar.'%';
        $inventories = DB::table('inventory_producto')
            ->join('inventories', 'inventory_producto.inventory_id', '=', 'inventories.id')
            ->join('productos', 'inventory_producto.producto_id', '=', 'productos.id')
            ->select('inventory_producto.inventory_id', 'inventories.nombre AS nombre_inv', 'inventory_producto.producto_id', 'productos.nombre AS nombre_prod', 'productos.marca', 'productos.descripcion', 'productos.precio', 'productos.cantidad', 'productos.statu_id')
            ->where('inventory_producto.inventory_id', '=', $this->inventory->id)
            ->paginate(5);
        return view('livewire.inventories-productos-table', compact('inventories'));
    }
}
