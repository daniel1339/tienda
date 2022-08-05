<div>
    <x-jet-danger-button wire:click="$set('open',true)">
        Crear nueva marca
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nueva marca
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre de la marca" />
                <x-jet-input wire:model="name" type="text" class="w-full" />
                @error('name')
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
                Crear marca
            </x-jet-danger-button>



        </x-slot>

    </x-jet-dialog-modal>



      
</div>
