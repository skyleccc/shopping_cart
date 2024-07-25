<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['cartID', 'productID', 'cartQuantity', 'cartPriceEach'];

     // Tell Eloquent to use a custom timestamp column
     const CREATED_AT = 'itemLastModified';
     const UPDATED_AT = 'itemLastModified'; 

    public function cart()
    {
        return $this->belongsTo(ShoppingCart::class, 'cartID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }
}