<?php

namespace App\Http\Livewire\Product;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProduct extends Component
{
    

    use WithPagination;
    
    public  $product;
    public $search = '';
    public $sort='id';
    public $direction='asc';
    public $open_edit=false;
    public $readyToLoad = false;

    protected $rules = [
        'product.name' => 'required|max:5',
        'product.observations' => 'required|max:500',
        'product.size' => 'required|max:5',
        'product.brand_id' => 'required|numeric',
        'product.qty' => 'required|numeric|max:15',
        'product.shipping_date' => 'required|date',
    ];

    
    protected $listeners = ['render', 'delete'];
    public function render()
    {


        if($this->readyToLoad){ 
        
            $products = Product::where('name','like','%'. $this->search . '%')
                                ->orderBy($this->sort , $this->direction)
                                ->paginate($this->cant);
        }else{
            $products = [];
        }
    
        $brands = Brand::all();
        
        return view('livewire.product.show-product', compact('products', 'brands'));
    }

  

    public function update(){
        $this->validate();
        $this->product->save();
        $this->reset('open_edit');
        $this->emit('alert','Este producto se actualizo con efectividad');

    }

   
    public function loadProducts(){
        $this->readyToLoad = true;
    }

    public function order($sort){
        if($this->sort == $sort){
            if($this->direction=='desc'){
                $this->direction='asc';
            } else{
                $this->direction='desc';
            }
        } else{
            $this->sort = $sort;
            $this->direction='asc';
        }    
    }

    public function edit(Product $product)
    {
        $this->product = $product; 
        $this->open_edit =true;

    }
    public $cant = '10';
    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort'=> ['except' => 'id'],
        'direction'=> ['except' => 'asc'],
        'search' => ['except' => '']
    ];

    public function updatingSearch(){
        $this->resetPage();

    }

    public function delete(Product $product){
        $product->delete();
    }
}
