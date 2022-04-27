<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Store a product in the users cart.
     *
     * @param string $id
     * @param Request $request
     * @return \JsonResponse
     */
    public function store($id, Request $request)
    {
        $product = Product::find($id);
        Cart::session($request->user()->id)->add([
            'id' => uniqid(),
            'name' => $product->locale_name,
            'price' => $product->price_with_vat,
            'quantity' => $request->quantity,
            'associatedModel' => $product,
        ]);
        return response()->json(['status' => true], 200);
    }

    /**
     * Return the cart total.
     *
     * @param Request $request
     * @return \JsonResponse
     */
    public function total(Request $request)
    {
        return response()->json(['total' => Cart::session($request->user()->id)->getTotal()], 200);
    }
}
