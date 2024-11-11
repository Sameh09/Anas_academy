<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateProduct extends Component
{
    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('required|min:1|max:10')]
    public $price;

    #[Rule('required|min:1|max:10')]
    public $quantity;

    public function create(){
        Product::create($this->validate());  
        session()->flash('success','Product Created Successfully ');  
        $this->reset('name','price','quantity');
        $this->dispatch('close-modal');
        $this->dispatch('product-created');

    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
