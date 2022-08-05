<?php

namespace App\Http\Livewire\Brand;

use App\Models\Brand;
use Livewire\Component;

class CreateBrand extends Component
{
    public $open=false; 
    public $name;
    
    protected $rules = [
        'name' => 'required|max:50',
        
        
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);

    }
    public function save(){

        $this->validate();
        Brand::create([
            'name' => $this->name,
           
        ]);

        $this->reset(['name', 'open']);
        $this->emitTo('brand.show-brand','render');
        $this->emit('alert','Este producto se creo con efectividad');
    }
       
    public function render()
    {
        return view('livewire.brand.create-brand');
    }
}
