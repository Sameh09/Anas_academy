<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\Attributes\On;


class Products extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    
    public $value;
    #[On('product-created')]
    public function updateList(){
        
    }
    public function render()
    {
        $products = Product::latest()->ProductsGreaterThan($this->value)->paginate(5);
        return view('livewire.products', ['products' => $products]);
    }
}
