<?php

use App\Models\Product;
use function Pest\Laravel\get;

test('nossa api de produto precisa retorna uma lista de products')
    ->get('/api/products')
    ->assertOk()
    ->assertExactJson([
        ['title' => 'Produto A'],
        ['title' => 'Produto B'],
    ]);


test('nossa api de produto precisa retorna uma lista de products do baco de dados', function () {
    $product1 = Product::factory()->create();
    $product2 = Product::factory()->create();

    get('/api/products')
        ->assertOk()
        ->assertExactJson([
            ['title' => 'Produto A'],
            ['title' => 'Produto B'],
            ['title' => $product1->title],
            ['title' => $product2->title],
        ]);
});
