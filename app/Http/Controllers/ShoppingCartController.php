<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function showCart(Request $request)
    {
        $userID = $request->query('userID');
        $shoppingCart = ShoppingCart::where('userID', $userID)
            ->with(['cartItems.product', 'user'])
            ->first();
    
        if (!$shoppingCart) {
            return view('shopping_cart', ['cartItems' => [], 'userFname' => '', 'userLname' => '']);
        }
    
        $cartItems = $shoppingCart->cartItems;
        $userFname = $shoppingCart->user->userFname;
        $userLname = $shoppingCart->user->userLname;
    
        return view('cart', [
            'cartItems' => $cartItems,
            'userFname' => $userFname,
            'userLname' => $userLname
        ]);
    }
    public function updateCart(Request $request)
    {
        $itemId = $request->input('itemId');
        $quantity = $request->input('quantity');
    
        if ($quantity > 0) {
            CartItem::where('id', $itemId)->update(['cartQuantity' => $quantity, 'itemLastModified' => now()]);
            return response()->json(['success' => true]);
        } else {
            CartItem::where('id', $itemId)->delete();
            return response()->json(['success' => true]);
        }
    }

}
