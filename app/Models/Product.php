<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use Translatable, HasFactory;

    /**
     * Set the translatable attributes.
     *
     * @var array
     */
    public $translatedAttributes = ['name', 'description'];

    /**
     * Set the protected attributes.
     *
     * @var array
     */
    public $guarded = ['id'];
}
