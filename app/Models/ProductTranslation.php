<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use HasFactory;

    /**
     * Set the timestamps to off.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Set the fillable attributes.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
