<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Statu;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductosEdit extends Component
{
    use AuthorizesRequests;
    public Producto $prod;
    public $titulo;
    public $color;

    protected $rules = [
        'prod.codigo' => 'required|min:6|max:10', 
        'prod.nombre' => 'required|max:50',
        'prod.marca' => 'required|max:50',
        'prod.descripcion' => 'required|max:50',
        'prod.cantidad' => 'required|numeric|min:0',
        'prod.statu_id' => 'required|numeric',
        'prod.precio' => 'required|numeric|min:0',
    ];

    public function mount($id = null, $ideliminar = null ){
        if(is_null($id) && is_null($ideliminar)){
            $this->titulo = "Nuevo Producto";
            $this->prod = new Producto();
            //Auth::user()->id;
        }elseif(is_null($id)){
            $this->prod = Producto::find($ideliminar);
            $this->prod->delete();
            return redirect()->route('productos');
        }else{
            $this->titulo = "Editar Producto";
            $this->prod = Producto::find($id);
        }
    } 

    public function render()
    {
        if($this->prod->cantidad <= 0){
            $this->prod->statu_id = 1;
            $this->color = "red";
        }else{
            $this->prod->statu_id = 2;
            $this->color = "green";
        }
        $status = Statu::all();
        return view('livewire.productos-edit', compact(['status']));
    }

    public function guardar(){
        $this->validate();
        if(is_null($this->prod->user_id)){
            $this->prod->user_id = Auth::user()->id;
        }
        //$this->authorize('update', $this->prod);

        $this->prod->save();

        return redirect()->route('productos');
    }

    public function guardar_productos(Request $request){
        $productos = new Producto();
        $productos->codigo = $request->codigo;
        $productos->nombre = $request->nombre;
        $productos->marca = $request->marca;
        $productos->descripcion = $request->descripcion;
        $productos->precio = $request->precio;
        $productos->cantidad = $request->cantidad;
        $productos->estatus = $request->estatus;
        //$productos->user_id = $request->user_id;
        $productos->save();
        return response()->json($productos, 200);
    }

    public function actualizar_productos(Request $request){
        $productos = Producto::find($request->id);
        $productos->codigo = $request->codigo;
        $productos->nombre = $request->nombre;
        $productos->marca = $request->marca;
        $productos->descripcion = $request->descripcion;
        $productos->precio = $request->precio;
        $productos->cantidad = $request->cantidad;
        $productos->estatus = $request->estatus;
        //$productos->user_id = $request->user_id;
        $productos->save();
        return response()->json($productos, 200);
    }

    public function eliminar_productos(Request $request){
        $productos = Producto::find($request->id);
        $productos->delete();
    }
}
