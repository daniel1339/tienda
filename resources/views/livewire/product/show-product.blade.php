<div wire:init="loadProducts">
   

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table>
            {{-- filtros --}}
            <div class="px-6 py-4 flex items-center">

                <div class="flex items-center">
                    <span>Mostrar</span>

                    <select wire:model="cant" class="mx-2 form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>

                    <span>entradas</span>
                </div>

                <x-jet-input class="flex-1 mx-4" placeholder="Escriba que producto busca" type="text"
                    wire:model="search" />
                @livewire('product.create-product')
            </div>

            @if (count($products))
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- tabla header --}}
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')">
                                ID
                                {{-- Sort --}}
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('name')">
                                Nombre
                                {{-- Sort --}}
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('size')">
                                Talla
                                {{-- Sort --}}
                                @if ($sort == 'size')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="">observaciones</span>
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="">Marcas</span>
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="">Cantidad</span>
                            </th>


                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="">Fecha embarque</span>
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="">Acciones</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{-- body --}}
                        @foreach ($products as $item)

                            <tr>

                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4  text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->size }}
                                    </div>
                                </td>

                                <td class="px-6 py-4  text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->observations }}
                                    </div>
                                </td>

                                <td class="px-6 py-4  text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        @if ($item->brand)
                                            {{ $item->brand->name }} 
                                        @endif
                                        
                                    </div>
                                </td>

                                <td class="px-6 py-4  text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->qty }}
                                    </div>
                                </td>

                                <td class="px-6 py-4  text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->shipping_date }}
                                    </div>
                                </td>
                                <td class="px-6 py-4  ext-sm font-medium flex">

                                    <a class="btn btn-green cursor-pointer" wire:click="edit({{ $item }})">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a class="btn btn-red ml-2 cursor-pointer" wire:click="$emit('deleteProduct', {{ $item->id }})">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>

                @if ($products->hasPages())

                    <div class="px-6 py-3">
                        {{ $products->links() }}
                    </div>

                @endif

            @else
                <div class="px-6 py-4">
                    No existe ningún registro coincidente
                </div>
            @endif

        </x-table>

    </div>

    {{-- modal edit --}}
    <x-jet-dialog-modal wire:model="open_edit">

        <x-slot name="title">
            Editar el producto
        </x-slot>

        <x-slot name="content">

            

            <div class="mb-4">
                <x-jet-label value="Nombre del producto" />
                <x-jet-input wire:model="product.name" type="text" class="w-full" />
                @error('product.name')
                    <span>{{$message}}</span>
                @enderror
            </div>

            <div>
                <x-jet-label value="observaciones" />
                <textarea wire:model="product.observations" rows="6" class="form-control w-full"></textarea>
                @error('product.observations')
                    <span>{{$message}}</span>
                @enderror
            </div>

            <div>
                <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tallas</label>
                <select wire:model="product.size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Selecciones una talla</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
            
                </select>
            </div>

            

            <div>
                <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Marcas</label>
                <select wire:model="product.brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Selecciones una talla</option>
                    @foreach ($brands as $brand)
                        
                   
                        
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    
                    @endforeach
                </select>
            </div>

            <div class="">
                <x-jet-label value="Cantidad" />
                <x-jet-input wire:model="product.qty" type="number" class="w-full" />
                @error('product.qty')
                    <span>{{$message}}</span>
                @enderror
            </div>

            <div class="">
                <x-jet-label value="Fecha embarque" />
                <x-jet-input wire:model="product.shipping_date" type="date" class="w-full" />
                @error('product.shipping_date')
                    <span>{{$message}}</span>
                @enderror
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    {{-- alert --}}

    @push('js')
        <script src="sweetalert2.all.min.js"></script>

        <script>
            Livewire.on('deleteProduct', productId => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡Esto no se puede revertir!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminarlo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('product.show-product', 'delete', productId);
                        Swal.fire(
                            '¡Eliminado!',
                            'Este producto ha sido eliminado.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush

</div>
