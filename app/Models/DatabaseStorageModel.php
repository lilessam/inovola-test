<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatabaseStorageModel extends Model
{
    /**
     * Override eloquent default table.
     *
     * @var string
     */
    protected $table = 'cart_storage';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'cart_data',
    ];

    /**
     * Mutator for cart_data column.
     *
     * @param $value
     */
    public function setCartDataAttribute($value)
    {
        $this->attributes['cart_data'] = serialize($value);
    }

    /**
     * Accessor for cart_data column.
     *
     * @param $value
     *
     * @return mixed
     */
    public function getCartDataAttribute($value)
    {
        return unserialize($value);
    }
}
