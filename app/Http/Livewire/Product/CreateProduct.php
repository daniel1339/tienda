<?php

namespace App\Http\Livewire\Product;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;

class CreateProduct extends Component
{

    public $open=false; 
    public $name, $observations, $size="";
    public $brand_id= "",$qty;
    public $shipping_date;

    protected $rules = [
        'name' => 'required|string|max:100',
        'observations' => 'required|string|max:500',
        'size' => 'required|max:5',
        'brand_id' => 'required|numeric',
        'qty' => 'required|numeric',
        'shipping_date' => 'required|date'
        
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);

    }
    public function save(){

        $this->validate();
        Product::create([
            'name' => $this->name,
            'observations'=> $this->observations,
            'size'=> $this->size,
            'brand_id'=> $this->brand_id, 
            'qty'=> $this->qty,
            'shipping_date'=> $this->shipping_date  
        ]);

        $this->reset(['name','observations','size','brand_id', 'qty', 'shipping_date', 'open']);
        $this->emitTo('product.show-product','render');
        $this->emit('alert','Este producto se creo con efectividad');
        
    }
    public function render()
    {
        $brands = Brand::all();
        return view('livewire.product.create-product', compact('brands'));
    }
}
