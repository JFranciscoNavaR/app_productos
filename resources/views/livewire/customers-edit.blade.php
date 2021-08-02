@section('titulo')
      {{$titulo}}
@endsection
<div class="w-full">
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">  
                <!-- Formulario Editar -->
                <section class="max-w-4xl p-6 mx-auto bg-white rounded-md dark:bg-gray-800">
                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Información del Cliente</h2>  
                    <form action="#" wire:submit.prevent='guardar' method="POST">

                        @csrf

                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-3">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="nombre">Nombre del Cliente</label>
                                <input id="nombre" type="text" name="nombre" wire:model='customer.nombre' class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" placeholder="Nombre" value="{{old('nombre')}}">
                                @error('customer.nombre')
                                      <div class="px-4 py-2 mt-1 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                          <p>Error! {{$message}}</p>
                                      </div>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="email">Correo del Cliente</label>
                                <input id="email" type="email" name="email" wire:model='customer.email' class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" placeholder="Correo" value="{{old('email')}}">
                                @error('customer.email')
                                      <div class="px-4 py-2 mt-1 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                          <p>Error! {{$message}}</p>
                                      </div>
                                @enderror
                            </div>
          
                            <div>
                              <label class="text-gray-700 dark:text-gray-200" for="telefono">Teléfono del Cliente</label>
                              <input id="telefono" type="num" name="telefono" wire:model='customer.telefono' class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" placeholder="Teléfono" value="{{old('telefono')}}">
                              @error('customer.telefono')
                                    <div class="px-4 py-2 mt-1 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                        <p>Error! {{$message}}</p>
                                    </div>
                              @enderror
                            </div>

                            <h2 class="col-span-6 sm:col-span-3 text-lg font-semibold text-gray-700 capitalize dark:text-white">Dirección del Cliente</h2>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="pais">País</label>
                                <select id="pais" type="text" name="pais" wire:model="customer.pais" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" value="{{old('pais')}}">
                                    <option value="">Seleccione un País</option>
                                    <option value="México">México</option>
                                </select>
                                @error('customer.pais')
                                      <div class="px-4 py-2 mt-1 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                          <p>Error! {{$message}}</p>
                                      </div>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="state_id">Estado</label>
                                <select id="state_id" type="text" name="state_id" wire:model="customer.state_id" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" value="{{old('state_id')}}">
                                    <option value="">Seleccione un Estado</option>
                                    @foreach ($states as $state)
                                        <option value="{{$state->id}}">{{$state->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('customer.state_id')
                                      <div class="px-4 py-2 mt-1 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                          <p>Error! {{$message}}</p>
                                      </div>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="municipio">Municipio</label>
                                <input id="municipio" type="text" name="municipio" wire:model='customer.municipio' class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" placeholder="Municipio" value="{{old('municipio')}}">
                                @error('customer.municipio')
                                      <div class="px-4 py-2 mt-1 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                          <p>Error! {{$message}}</p>
                                      </div>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="localidad">Localidad</label>
                                <input id="localidad" type="text" name="localidad" wire:model='customer.localidad' class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" placeholder="Localidad" value="{{old('localidad')}}">
                                @error('customer.localidad')
                                      <div class="px-4 py-2 mt-1 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                          <p>Error! {{$message}}</p>
                                      </div>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="codigo_postal">Código Postal</label>
                                <input id="codigo_postal" type="text" name="codigo_postal" wire:model='customer.codigo_postal' class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" placeholder="Código Postal" value="{{old('codigo_postal')}}">
                                @error('customer.codigo_postal')
                                      <div class="px-4 py-2 mt-1 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                          <p>Error! {{$message}}</p>
                                      </div>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="calle">Calle</label>
                                <input id="calle" type="text" name="calle" wire:model='customer.calle' class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" placeholder="Calle" value="{{old('calle')}}">
                                @error('customer.calle')
                                      <div class="px-4 py-2 mt-1 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                          <p>Error! {{$message}}</p>
                                      </div>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="num_ext">Núm. Ext.</label>
                                <input id="num_ext" type="number" name="num_ext" wire:model='customer.num_ext' class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" placeholder="Núm. Ext." value="{{old('num_ext')}}">
                                @error('customer.num_ext')
                                      <div class="px-4 py-2 mt-1 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                          <p>Error! {{$message}}</p>
                                      </div>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="num_ext">Núm. Int.</label>
                                <input id="num_int" type="number" name="num_int" wire:model='customer.num_int' class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" placeholder="Núm. Int." value="{{old('num_int')}}">
                                @error('customer.num_int')
                                      <div class="px-4 py-2 mt-1 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                          <p>Error! {{$message}}</p>
                                      </div>
                                @enderror
                            </div>
                        </div>
          
                        <div class="flex justify-end mt-6">
                            <span class="hidden sm:block" >
                              <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
                              <!-- Heroicon name: solid/pencil -->
                                  <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="rgba(255, 255, 255, var(--tw-bg-opacity))" aria-hidden="true">
                                      <path xmlns="http://www.w3.org/2000/svg" d="M0 2C0 .9.9 0 2 0h14l4 4v14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5 0v6h10V2H5zm6 1h3v4h-3V3z"/>
                                  </svg>
                                  Guardar
                              </button>
                          </span>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>