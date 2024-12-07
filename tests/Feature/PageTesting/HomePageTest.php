<?php

use function Pest\Laravel\get;

test('home page is accessible', function () {
    $response = get('/');
    $response->assertStatus(200);
});

test('home page contains specific text', function () {
    $response = get('/');
    $response->assertSee('International Exposure Program'); // Ganti dengan teks yang ada di halaman home
});


