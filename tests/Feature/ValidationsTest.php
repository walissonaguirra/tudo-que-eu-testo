<?php

use function Pest\Laravel\postJson;

test('product :: valida se o titulo existe', function () {

    postJson(route('product.create'), [])
        ->assertStatus(422)
        ->assertInvalid(['title' => 'required']);

});

test('product :: valida se o titulo tem mais de 255 caracteries', function () {

    postJson(route('product.create'), [
        'title' => str_repeat('*', 256)
    ])
    ->assertStatus(422)
    ->assertInvalid(['title' => 'The title field must not be greater than 255 characters.']);

});
