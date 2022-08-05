<div>
    <x-jet-danger-button wire:click="$set('open',true)">
        Crear nuevo producto
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo producto
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre del producto" />
                <x-jet-input wire:model="name" type="text" class="w-full" />
                @error('name')
                    <span>{{$message}}</span>
                @enderror
            </div>

            <div>
                <x-jet-label value="observaciones" />
                <textarea wire:model="observations" rows="6" class="form-control w-full"></textarea>
                @error('observations')
                    <span>{{$message}}</span>
                @enderror
            </div>

            <div>
                <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tallas</label>
                <select wire:model="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected disabled>Selecciones una talla</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
            
                </select>
            </div>

            

            <div>
                <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Marcas</label>
                <select wire:model="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected disabled>Selecciones una talla</option>
                    @foreach ($brands as $brand)
                        
                   
                        
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    
                    @endforeach
                </select>
            </div>

            <div class="">
                <x-jet-label value="Cantidad" />
                <x-jet-input wire:model="qty" type="number" class="w-full" />
                @error('qty')
                    <span>{{$message}}</span>
                @enderror
            </div>

            <div class="">
                <x-jet-label value="Fecha embarque" />
                <x-jet-input wire:model="shipping_date" type="date" class="w-full" />
                @error('shipping_date')
                    <span>{{$message}}</span>
                @enderror
            </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target='save'
                class="disabled:opacity-25">
                Crear producto
            </x-jet-danger-button>



        </x-slot>

    </x-jet-dialog-modal>



      
</div>
