<?php

use function Pest\Laravel\get;

test('Event page is accessible', function () {
    $response = get('/event');
    $response->assertStatus(200);
});

test('Event page contains specific text', function () {
    $response = get('/event');
    $response->assertSee('Big Event'); // Ganti dengan teks yang ada di halaman home
});


