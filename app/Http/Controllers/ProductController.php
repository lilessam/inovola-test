<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Set up a new product.
     *
     * @param ProductStoreRequest $request
     * @return void
     */
    public function store(ProductStoreRequest $request)
    {
        $product = new Product;
        $product->store_id = $request->user()->store->id;
        $product->fill([
            'en' => [
              'name' => $request->en_name,
              'description' => $request->en_description,
            ],
            'ar' => [
              'name' => $request->ar_name,
              'description' => $request->ar_description,
            ],
            'price' => (float) $request->price,
        ]);
        $product->save();

        return response()->json(['status' => true, 'data' => $product], 200);
    }
}
