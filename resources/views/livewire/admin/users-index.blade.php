@section('titulo')
    {{$titulo}}
@endsection
<div class="py-12">
    <div class="w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <!-- Buscador -->
            <div class="flex-1 p-4">
                <div class="flex items-center">

                    <div class="relative md:w-1/2">
                        <input type="search" wire:model="buscar" class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium border-gray-300" placeholder="Buscar...">
                        <div class="absolute top-0 left-0 inline-flex items-center p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none">
                                </rect>
                                <circle cx="10" cy="10" r="7" />
                                <line x1="21" y1="21" x2="15" y2="15" />
                            </svg>
                        </div>
                    </div>

                    <div class="relative mr-2 ml-2 md:w-1/4">
                        <select wire:model="filtro" class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium border-gray-300"> 
                            <option value="name">Buscar Por:</option>
                            <option value="name">Nombre</option>
                            <option value="email">Correo</option>
                        </select>
                        <div class="absolute top-0 left-0 inline-flex items-center p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none">
                                </rect>
                                <circle cx="10" cy="10" r="7" />
                                <line x1="21" y1="21" x2="15" y2="15" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex ml-48 mr-2">
                        <a href="#" class="text-white hover:text-black">
                            <span class="hidden sm:block" >
                                <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:text-gray-700 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 ">
                                <!-- Heroicon name: solid/pencil -->
                                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="rgba(255, 255, 255, var(--tw-bg-opacity))" aria-hidden="true">
                                        <path xmlns="http://www.w3.org/2000/svg" d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/>
                                    </svg>
                                    Agregar
                                </button>
                            </span>
                        </a>
                    </div> 
                </div>                   

                </div>
                @if($users->count())
                <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr class="divide-x divide-gray-200">
                                                <th scope="col" class="w-1/2 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nombre
                                                </th>
                                                
                                                <th scope="col" class="w-1/2 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Correo
                                                </th>
                                
                                                <th scope="col" class="w-1/12 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Editar
                                                <span class="sr-only">Editar</span>
                                                </th>
                                                
                                                <th scope="col" class="w-1/12 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Eliminar
                                                <span class="sr-only">Eliminar</span>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($users as $user)      
                                            <tr class="divide-x divide-gray-200">
                                                <td class="w-auto px-6 py-3 text-center whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{$user->name}}
                                                    </div>
                                                </td>
                                
                                                <td class="w-auto px-6 py-3 text-center whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{$user->email}}
                                                    </div>
                                                </td>

                                                @if ($users->count())
                                                    <td class="w-1/12 px-6 py-3 text-center whitespace-nowrap">
                                                        <a href="{{route('admin.users.edit', $user)}}" class="text-white hover:text-black">
                                                            <div class="hidden sm:block">
                                                                <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-white bg-yellow-500 hover:text-gray-700 hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                                                <!-- Heroicon name: solid/pencil -->
                                                                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="rgba(255, 255, 255, var(--tw-bg-opacity))" aria-hidden="true">
                                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                                    </svg>
                                                                    Editar
                                                                </button>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    
                                                    <td class="w-1/12 px-6 py-4 whitespace-nowrap">
                                                        <a href="#" class="text-white hover:text-black">
                                                            <div class="hidden sm:block" >
                                                                <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:text-gray-700 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                                <!-- Heroicon name: solid/pencil -->
                                                                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="rgba(255, 255, 255, var(--tw-bg-opacity))" aria-hidden="true">
                                                                        <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/>
                                                                    </svg>
                                                                    Eliminar
                                                                </button>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    
                                                    @endif
                                            </tr>
                                        @endforeach
                                        <!-- More items... -->
                                        </tbody>
                                    </table>

                                    <!-- Paginación -->
                                    <div class="bg-white px-4 py-3 item-center justify-between border-t border-gray-200 sm:px-6">        
                                        {{$users->links()}}      
                                    </div>
                                </div>
                            </div>
                        </div>
                @else
                    <div class="bg-white px-4 py-3 item-center justify-between border-t border-gray-200 sm:px-6">
                        No hay resultado(s) o registro(s) para la busqueda "{{$buscar}}"
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>