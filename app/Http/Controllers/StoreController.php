<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Update authenticated user's store entry.
     *
     * @param StoreUpdateRequest $request
     * @return \JsonResponse
     */
    public function update(StoreUpdateRequest $request)
    {
        $store = $request->user()->store;
        $store->name = $request->name;
        $store->vat_in_products = (bool) $request->vat_in_products;
        $store->vat = (float) $request->vat;
        $store->save();
        return response()->json(['status' => true, 'data' => $store], 200);
    }
}
