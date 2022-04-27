<?php

namespace App;

use App\Models\DatabaseStorageModel;
use Darryldecode\Cart\CartCollection;

class CartDatabaseStorage
{
    /**
     * Check if the cart has an item.
     *
     * @param string $key
     * @return boolean
     */
    public function has($key)
    {
        return DatabaseStorageModel::find($key);
    }

    /**
     * Return an item
     *
     * @param string $key
     * @return \Collection|[]
     */
    public function get($key)
    {
        if ($this->has($key)) {
            return new CartCollection(DatabaseStorageModel::find($key)->cart_data);
        } else {
            return [];
        }
    }

    /**
     * Put an item/items.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function put($key, $value)
    {
        if ($row = DatabaseStorageModel::find($key)) {
            $row->cart_data = $value;
            $row->save();
        } else {
            DatabaseStorageModel::create([
                'id' => $key,
                'cart_data' => $value,
            ]);
        }
    }
}
