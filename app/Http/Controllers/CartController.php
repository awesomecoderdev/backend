<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use AwesomeCoder\ShoppingCart\Facades\Cart;
use Illuminate\Http\Response as JsonResponse;

class CartController extends Controller
{
    /**
     * Display listing of the cart.
     *
     * @return \AwesomeCoder\ShoppingCart\Facades\Cart
     */
    public function cart()
    {

        // Cart::instance('wishlist')->remove();
        // Cart::instance('wishlist')->add('sdjk922', 'Product 2', 1, 19.95, ['size' => 'medium']);

        // Cart::remove();
        // Cart::add('normal', 'Product 1', 5, 10, ['size' => 'large']);
        // Cart::add('pro', 'Product 2', 2, 20, ['size' => 'large']);
        // Cart::add('max', 'Product 3', 1, 30, ['size' => 'large']);

        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_ACCEPTED,
            "message" => "Successfully Authorized.",
            "data" => [
                "count" => Cart::count(),
                "tax_percentage" => config("cart.tax"),
                "tax" => Cart::tax(),
                "subtotal" => Cart::subtotal(),
                "total" => Cart::total(),
                "cart" => Cart::content(),
                // "group" => Cart::content()->groupBy('id'),
            ],
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Add product to cart.
     *
     * @return \AwesomeCoder\ShoppingCart\Facades\Cart
     */
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->input("product_id"));

        try {
            Cart::add(
                $product->id,
                $product->name,
                ($request->input("qty") ? intval($request->input("qty")) : 1),
                $product->price,
                $product->meta != null && (is_array($product->meta) || is_object($product->meta)) ? $product->meta : []
            );
        } catch (\Exception $th) {
            //throw $th;
        }


        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_ACCEPTED,
            "message" => "Successfully Authorized.",
            "data" => [
                "count" => Cart::count(),
                "tax_percentage" => config("cart.tax"),
                "tax" => Cart::tax(),
                "subtotal" => Cart::subtotal(),
                "total" => Cart::total(),
                "cart" => Cart::content(),
                // "group" => Cart::content()->groupBy('id'),
            ],
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Add product to cart.
     *
     * @return \AwesomeCoder\ShoppingCart\Facades\Cart
     */
    public function update(Request $request)
    {
        try {
            $product = Cart::get($request->input("cart_id"));
            if ($request->input("qty")) {
                $qty = intval($request->input("qty"));
                if ($qty > 0 && $qty != $product->qty) {
                    $product->qty = $qty;
                }
            }

            return Response::json([
                "success" => true,
                'status'    => JsonResponse::HTTP_ACCEPTED,
                "message" => "Successfully Authorized.",
                // "product" => $product
                "data" => [
                    "count" => Cart::count(),
                    "tax_percentage" => config("cart.tax"),
                    "tax" => Cart::tax(),
                    "subtotal" => Cart::subtotal(),
                    "total" => Cart::total(),
                    "cart" => Cart::content(),
                    // "group" => Cart::content()->groupBy('id'),
                ],
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $th) {
            return Response::json([
                "success" => false,
                'status'  => JsonResponse::HTTP_NOT_FOUND,
                'message' =>  "Product Not Found.",
            ], JsonResponse::HTTP_OK);
        }
    }

    /**
     * Add product to cart.
     *
     * @return \AwesomeCoder\ShoppingCart\Facades\Cart
     */
    public function remove(Request $request)
    {
        try {
            Cart::remove($request->input("cart_id"));
            return Response::json([
                "success" => true,
                'status'    => JsonResponse::HTTP_ACCEPTED,
                "message" => "Successfully Authorized.",
                "data" => [
                    "count" => Cart::count(),
                    "tax_percentage" => config("cart.tax"),
                    "tax" => Cart::tax(),
                    "subtotal" => Cart::subtotal(),
                    "total" => Cart::total(),
                    "cart" => Cart::content(),
                    // "group" => Cart::content()->groupBy('id'),
                ],
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $th) {
            // return Response::json([
            //     "success" => false,
            //     'status'  => JsonResponse::HTTP_ACCEPTED,
            //     'message'   =>  "Unauthenticated Access.",
            // ], JsonResponse::HTTP_OK);

            return Response::json([
                "success" => true,
                'status'    => JsonResponse::HTTP_ACCEPTED,
                "message" => "Successfully Authorized.",
                "data" => [
                    "count" => Cart::count(),
                    "tax_percentage" => config("cart.tax"),
                    "tax" => Cart::tax(),
                    "subtotal" => Cart::subtotal(),
                    "total" => Cart::total(),
                    "cart" => Cart::content(),
                    // "group" => Cart::content()->groupBy('id'),
                ],
            ], JsonResponse::HTTP_OK);
        }
    }
}
