<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AwesomeCoder\ShoppingCart\Facades\Cart;

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
        Cart::add('pro', 'Product 1', 1, 9.99, ['size' => 'large']);
        return Cart::content();
    }
}
