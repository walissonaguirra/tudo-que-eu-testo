<?php

test('a rota products esta utilizando a view products')
    ->get('/products')
    ->assertViewIs('products');

test('a rota products esta passando uma lista de produtos para view products')
    ->get('/products')
    ->assertViewIs('products')
    ->assertViewHas('products');
