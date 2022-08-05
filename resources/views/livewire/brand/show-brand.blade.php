<div wire:init="loadBrands">
   

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table>
                {{-- Filtros--}}
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

                <x-jet-input class="flex-1 mx-4" placeholder="Escriba que marca busca" type="text"
                    wire:model="search" />
                @livewire('brand.create-brand')
            </div>

            @if (count($brands))
                <table class="min-w-full divide-y divide-gray-200">

                    {{-- Tabla header--}}
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
                            
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Acciones</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{-- tabla body --}}
                        @foreach ($brands as $item)

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
                                
                                <td class="px-6 py-4  ext-sm font-medium flex">

                                    <a class="btn btn-green cursor-pointer" wire:click="edit({{ $item }})">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a class="btn btn-red ml-2 cursor-pointer" wire:click="$emit('deleteBrand', {{ $item->id }})">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>

                @if ($brands->hasPages())

                    <div class="px-6 py-3">
                        {{ $brands->links() }}
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
            Editar la marca
        </x-slot>

        <x-slot name="content">

            

            <div class="mb-4">
                <x-jet-label value="Nombre de la marca" />
                <x-jet-input wire:model="brand.name" type="text" class="w-full" />
                @error('brand.name')
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

    @push('js')
        <script src="sweetalert2.all.min.js"></script>
            {{-- alerta --}}
        <script>
            Livewire.on('deleteBrand', brandId => {
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
                        Livewire.emitTo('brand.show-brand', 'delete', brandId);
                        Swal.fire(
                            '¡Eliminado!',
                            'Este marca ha sido eliminada.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush

</div>

