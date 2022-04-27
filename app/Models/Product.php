<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\App;

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
    protected $guarded = ['id'];

    /**
     * Added attributes to objects.
     *
     * @var array
     */
    protected $appends = ['locale_name', 'locale_description', 'price_with_vat'];

    /**
     * Define relationship with store model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Add `locale_name` attribute.
     *
     * @return string
     */
    public function getLocaleNameAttribute()
    {
        return $this->{'name:'.App::currentLocale()};
    }

    /**
     * Add `locale_description` attribute.
     *
     * @return string
     */
    public function getLocaleDescriptionAttribute()
    {
        return $this->{'description:'.App::currentLocale()};
    }

    /**
     * Add `price_with_vat` attribute.
     *
     * @return float
     */
    public function getPriceWithVatAttribute()
    {
        if ($this->store->vat_in_products) {
            return $this->price;
        } else {
            return $this->price + ($this->price/100*$this->store->vat);
        }
    }
}
