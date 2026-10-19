<?php

test('public registration is disabled', function () {
    $response = $this->get('/register');

    $response->assertNotFound();
});

test('guests cannot create accounts through public registration', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertGuest();
    $response->assertNotFound();
});
