<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingCart $shoppingCart)
    {
        //
    }


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
