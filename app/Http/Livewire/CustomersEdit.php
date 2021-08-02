<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomersEdit extends Component
{
    
    public Customer $customer;

    public $titulo;

    protected $rules = [ 
        'customer.nombre' => 'required|max:50',
        'customer.email' => 'required|max:50',
        'customer.telefono' => 'required|numeric|max:10',
        'customer.pais' => 'required|max:50',
        'customer.municipio' => 'required|max:50',
        'customer.localidad' => 'required|max:50',
        'customer.codigo_postal' => 'required|numeric',
        'customer.calle' => 'required|max:50',
        'customer.num_ext' => 'required|numeric',
        'customer.num_int' => 'required|numeric',

        'customer.state_id' => 'required|numeric',
    ];

    public function mount($id = null, $ideliminar = null ){
        if(is_null($id) && is_null($ideliminar)){
            $this->titulo = "Nuevo Cliente";
            $this->customer = new Customer();
        }elseif(is_null($id)){
            $this->customer = Customer::find($ideliminar);
            $this->customer->delete();
            return redirect()->route('customers');
        }else{
            $this->titulo = "Editar Cliente";
            $this->customer = Customer::find($id);
        }
    } 

    public function render()
    {
        $states = State::all()->sortBy('nombre', SORT_NATURAL);
        return view('livewire.customers-edit', compact('states'));
    }

    public function guardar(){
        
        $this->validate();
        if(is_null($this->customer->user_id)){
            $this->customer->user_id = Auth::user()->id;
        }

        $this->customer->save();

        return redirect()->route('customers');
    }

    public function guardar_clientes(Request $request){
        if($request->id = null){
            $customers = new Customer();
        }else{
            $customers = Customer::find($request->id);
        }
        $customers->nombre = $request->nombre;
        $customers->email = $request->email;
        $customers->telefono = $request->telefono;
        $customers->pais = $request->pais;
        $customers->municipio = $request->municipio;
        $customers->localidad = $request->localidad;
        $customers->codigo_postal = $request->codigo_postal;
        $customers->calle = $request->calle;
        $customers->num_ext = $request->num_ext;
        $customers->num_int = $request->num_int;
        $customers->state_id = $request->state_id;
        $customers->user_id = $request->user_id;
        $customers->save();
        return response()->json($customers, 200);
    }

    public function actualizar_clientes(Request $request){
        $customers = Customer::find($request->id);
        $customers->nombre = $request->nombre;
        $customers->email = $request->email;
        $customers->telefono = $request->telefono;
        $customers->pais = $request->pais;
        $customers->municipio = $request->municipio;
        $customers->localidad = $request->localidad;
        $customers->codigo_postal = $request->codigo_postal;
        $customers->calle = $request->calle;
        $customers->num_ext = $request->num_ext;
        $customers->num_int = $request->num_int;
        $customers->state_id = $request->state_id;
        $customers->user_id = $request->user_id;
        $customers->save();
        return response()->json($customers, 200);
    }

    public function eliminar_clientes(Request $request){
        $customers = Customer::find($request->id);
        $customers->delete();
    }
}
