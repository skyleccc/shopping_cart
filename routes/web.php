<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


Route::get('/', function (Request $request) {
    // session_start();
    // if(isset($_SESSION["account"])){
    //     return redirect('/home');
    // } else {
    //     return view('Login');
    // }

    $userID = 1; // Set your user ID here
    return redirect()->to('/cart?userID=' . $userID);
});

// Route::get('/images/{filename}', function($filename){
//     $path = resource_path().'/views/images/'.$filename;
//     if(!File::exists($path)) {
//         return abort(404);
//     }
//     $file = File::get($path);
//     $type = File::mimeType($path);
//     $response = Response::make($file, 200);
//     $response->header("Content-Type", $type);
//     return $response;
// });

Route::post('/login/authentication', [LoginController::class, 'authentication']);

Route::get('/get_accounts', [LoginController::class, 'get_accounts']);

// use App\Http\Controllers\CartController;

// Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
// Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');


use App\Http\Controllers\ShoppingCartController;

Route::get('/cart', [ShoppingCartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/update', [ShoppingCartController::class, 'updateCart'])->name('cart.update');
// Route::patch('/cart/increase/{id}', [ShoppingCartController::class, 'increase']);
// Route::patch('/cart/decrease/{id}', [ShoppingCartController::class, 'decrease']);
// Route::delete('/cart/{id}', [ShoppingCartController::class, 'destroy']);