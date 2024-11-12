<?php

use App\Models\Product;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

test('deve criar um produto', function () {

    postJson(route('product.create'), [
        'title' => 'Produto Teste'
    ])->assertCreated();

    assertDatabaseHas('products', [ 'title' => 'Produto Teste' ]);

    assertDatabaseCount('products', 1);

});

test('deve atualizar um produto', function () {

    $product = Product::factory()->create();

    putJson(route('product.update', $product), [
        'title' => 'novo title'
    ])->assertOk();

    assertDatabaseHas('products', [
        'id' => $product->id,
        'title' => 'novo title'
    ]);

    assertDatabaseCount('products', 1);
});

test('deve apagar um produdo', function () {
    $product = Product::factory()->create();

    deleteJson(route('product.delete', $product))
        ->assertNoContent();

    assertDatabaseMissing('products', [
        'id' => $product->id,
    ]);

    assertDatabaseCount('products', 0);
});
