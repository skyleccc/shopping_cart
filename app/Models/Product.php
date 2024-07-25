<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'prodID';
    protected $fillable = ['prodName', 'prodDesc', 'prodImageURL'];

    // Tell Eloquent to use a custom timestamp column
    const CREATED_AT = 'prodLastModified';
    const UPDATED_AT = 'prodLastModified'; 

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'productID');
    }
}