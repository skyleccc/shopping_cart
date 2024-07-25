<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $primaryKey = 'cartID';
    protected $fillable = ['userID', 'totalQuantity', 'totalAmount'];

         // Tell Eloquent to use a custom timestamp column
         const CREATED_AT = 'cartLastModified';
         const UPDATED_AT = 'cartLastModified'; 

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'cartID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}