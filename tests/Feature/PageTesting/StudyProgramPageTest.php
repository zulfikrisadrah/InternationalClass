<?php

use function Pest\Laravel\get;

test('Study Program page is accessible', function () {
    $response = get('/IE');
    $response->assertStatus(200);
});

test('Study Program page contains specific text', function () {
    $response = get('/IE');
    $response->assertSee('All Program'); // Ganti dengan teks yang ada di halaman home
});


