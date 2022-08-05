<?php

namespace App\Http\Livewire\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBrand extends Component
{

    use WithPagination;
    
    public  $brand;
    public $search = '';
    public $sort='id';
    public $direction='asc';
    public $open_edit=false;
    public $readyToLoad = false;

    protected $rules = [
        'brand.name' => 'required|max:50',
      
    ];

    
    protected $listeners = ['render', 'delete'];
    public function render()

    {
        if($this->readyToLoad){ 
        
            $brands = Brand::where('name','like','%'. $this->search . '%')
                                ->orderBy($this->sort , $this->direction)
                                ->paginate($this->cant);
        }else{
            $brands = [];
        }
        return view('livewire.brand.show-brand', compact('brands'));
    }

    
    public function update(){
        $this->validate();
        $this->brand->save();
        $this->reset('open_edit');
        $this->emit('alert','Este marca se actualizo con efectividad');

    }

   
    public function loadBrands(){
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

    public function edit(Brand $brand)
    {
        $this->brand = $brand; 
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

    public function delete(Brand $brand){
        $brand->delete();
    }
}
