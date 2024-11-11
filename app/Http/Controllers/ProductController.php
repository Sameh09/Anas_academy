<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        $products = Product::paginate(5);
        return response()->json($products);
    }
    public function create(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ]);
        if (!$request) {
            return response()->json([
                'msg' => 'error '
            ]);
        }
        return response()->json([
            'msg' => 'product created successfully'
        ]);
    }

    public function update(Request $request, Product $product)
    {
        //$this->authorize('update', $product);
        $updated = Product::where('id',$request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ]);
        if ($updated) {
            return response()->json('product updated successfully');
        }
        
    }

    public function delete(Request $request,Product $product)
    {
        //$this->authorize('delete', $product);
        Product::find($request->id)->delete();
        return response()->json('product deleted');
        
    }
}
