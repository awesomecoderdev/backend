<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AwesomeCoder\ShoppingCart\Facades\Cart;
use Illuminate\Http\Response as JsonResponse;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    /**
     * Display listing of the cart.
     *
     * @return \AwesomeCoder\ShoppingCart\Facades\Cart
     */
    public function cart()
    {
        Cart::remove();
        Cart::add('normal', 'Product 1', 5, 10, ['size' => 'large']);
        Cart::add('pro', 'Product 2', 2, 20, ['size' => 'large']);
        Cart::add('max', 'Product 3', 1, 30, ['size' => 'large']);
        // return Cart::content();

        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_ACCEPTED,
            "message" => "Successfully Authorized.",
            "tax_percentage" => config("cart.tax"),
            "data" => [
                "subtotal" => Cart::subtotal(),
                "total" => Cart::total(),
                "tax" => Cart::tax(),
                "count" => Cart::count(),
            ],
            "cart" => Cart::content(),
            // "group" => Cart::content()->groupBy('id'),

        ], JsonResponse::HTTP_OK);
    }
}
