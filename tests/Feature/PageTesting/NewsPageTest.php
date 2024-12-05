<?php

use function Pest\Laravel\get;

test('News page is accessible', function () {
    $response = get('/news');
    $response->assertStatus(200);
});

test('News page contains specific text', function () {
    $response = get('/news');
    $response->assertSee('Popular News'); // Ganti dengan teks yang ada di halaman home
});


