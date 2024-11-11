<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    
    public function test_add_new_product()
    {
        
        $productData = [
            'name' => 'Test Product',
            'price' => 100,
            'quantity' => 10,
        ];

        
        $response = $this->post('/api/create', $productData);

        
        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'price' => 100,
            'quantity' => 10,
        ]);

        $response->assertStatus(201); 
    }
}
