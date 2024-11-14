<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(
            config('stripe.api_key.secret')
        );
    }

    public function pay(Product $product, Request $request)
    {
        // $id = $this->stripe->products->create([
        //     'name' => 'tshirt'
        // ])->id;

        // $price = $this->stripe->prices->create([
        //     'product' => $id,
        //     'unit_amount' => 100*$product->price,
        //     'currency' => 'sar',
        //     // 'recurring' => ['interval' => 'month'],
        //     // 'lookup_key' => 'standard_monthly',
        // ])->id;

        $session = $this->stripe->checkout->sessions->create([
            'mode' => 'payment',
            'success_url' => 'http://localhost:8000/',
            'cancel_url' => 'http://localhost:8000/cancel',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'SAR',
                        'product_data' => [
                            'name' => 'T-shirt',
                            'description' => $product->name,
                            'images' => ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdUHDpwKNvV5F9ombsGeKv-gNUnJ1OdNUy6A&s']
                        ],
                        'unit_amount' => 100 * $product->price,
                    ],
                    'quantity' => $product->quantity,
                ]
            ]



        ]);

        if ($session) {
            Order::create([
                'product_id' => $product->id,
                'quantity' => $product->quantity,
                'total_amount' => $product->quantity * $product->price,
                'status' => 'paid',
            ]);
            $message = 'Your order was placed successfully';
        }else{
            $message = 'Your order was failed';

        }
        return redirect($session->url)->with('success',$message);;
    }
}
