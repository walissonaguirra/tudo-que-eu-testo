<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/403', function () {

    abort_if(true, 403);
});


Route::get('/products', function () {
    return view('products', [
        'products' => Product::all()
    ]);
});

Route::post('/product', function () {

    request()->validate([
        'title' => 'required|max:255'
    ]);

    return Product::create(request()->only('title'));
})->name('product.create');

Route::put('/product/{product}', function (Product $product) {

    return $product->fill(request()->only('title'))->save();

})->name('product.update');

Route::delete('/product/{product}', function (Product $product) {

    $product->delete();

    return response()->noContent();

})->name('product.delete');
