<?php

test('testando código 200')
    ->get('/')
    ->assertOK();

test('testando código 404')
    ->get('/404')
    ->assertNotFound();

test('testando código 403:: não tem permissão de acesso')
    ->get('/403')
    ->assertForbidden();
