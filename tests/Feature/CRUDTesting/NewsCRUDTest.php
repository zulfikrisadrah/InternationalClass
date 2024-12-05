<?php

use App\Models\News;
use App\Models\User;
use function Pest\Laravel\{post, get, put, delete};
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use Spatie\Permission\Models\Role;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Permission;



beforeEach(function () {
    // Pastikan role 'admin' dan 'staff' sudah ada di tabel roles
    $adminRole = Role::firstOrCreate(['name' => 'admin']);
    $staffRole = Role::firstOrCreate(['name' => 'staff']);

    // Pastikan izin untuk manage news ada
    $permissions = Permission::firstOrCreate(['name' => 'manage news']);

    // Tambahkan izin ke role admin dan staff
    $adminRole->givePermissionTo($permissions);
    $staffRole->givePermissionTo($permissions);
});


$roles = ['admin', 'staff']; // Daftar role yang dapat mengakses fitur CRUD

foreach ($roles as $roleName) {

    // CREATE 
    it("allows a $roleName to create news", function () use ($roleName) {
        $user = User::factory()->create([
            'username' => env("API_USERNAME_{$roleName}"),
            'password' => bcrypt(env("API_PASSWORD_{$roleName}")),
        ]);

        // Assign role
        $role = Role::findByName($roleName);
        $user->assignRole($role);

        // Login sebagai user dengan role tertentu
        actingAs($user)
        ->get(route('admin.news.create'))  // Akses halaman create
        ->assertStatus(200);

        // Data untuk membuat news
        $newsData = [
            'News_Title' => 'Testing Create News Title',
            'News_Content' => 'Testing Create News Content',
            'Publication_Date' => now()->toDateString(),
            'News_Image' => UploadedFile::fake()->create('news_image.jpg', 100),
            'user_id' => $user->id,
        ];

        // Kirim data untuk membuat news
        $response = post(route('admin.news.store'), $newsData);

        // Pastikan status sukses
        $response->assertStatus(302);
        assertDatabaseHas('news', [
            'News_Title' => 'Testing Create News Title',
        ]);
    });
    // READ/VIEW
    it("allows a $roleName to view the news index", function () use ($roleName) {
        // Buat user dengan role tertentu
        $user = User::factory()->create([
            'username' => env("API_USERNAME_{$roleName}"),
            'password' => bcrypt(env("API_PASSWORD_{$roleName}")),
        ]);

        // Assign role
        $role = Role::findByName($roleName);
        $user->assignRole($role);

        // Login sebagai user
        actingAs($user);

        // Buat data berita untuk diuji
        $news = News::create([
            'News_Title' => 'View Title',
            'News_Content' => 'View Content',
            'Publication_Date' => now()->toDateString(),
            'News_Image' => UploadedFile::fake()->create('news_image.jpg', 100),
            'user_id' => $user->id,
        ]);

        // Akses halaman index berita
        $response = get(route('admin.news.index'));

        // Pastikan status 200
        $response->assertStatus(200);

        // Pastikan berita terlihat di halaman index
        $response->assertSee('View Title');
    });

    // UPDATE
    it("allows a $roleName to update news", function () use ($roleName) {
        // Buat user dengan role tertentu
        $user = User::factory()->create([
            'username' => env("API_USERNAME_{$roleName}"),
            'password' => bcrypt(env("API_PASSWORD_{$roleName}")),
        ]);

        // Assign role
        $role = Role::findByName($roleName);
        $user->assignRole($role);

        // Login sebagai user
        actingAs($user);

        // Buat data berita untuk diuji
        $news = News::create([
            'News_Title' => 'Update Title',
            'News_Content' => 'Update Content',
            'Publication_Date' => now()->toDateString(),
            'News_Image' => UploadedFile::fake()->create('news_image.jpg', 100),
            'user_id' => $user->id, // Pastikan user yang membuat
        ]);

        // Data untuk memperbarui berita
        $updatedData = [
            'News_Title' => 'Updated Title',
            'News_Content' => 'Updated Content',
            'Publication_Date' => now()->toDateString(),
            'News_Image' => UploadedFile::fake()->create('news_image.jpg', 100),
            'user_id' => $user->id,
        ];

        // Kirim permintaan update
        $response = put(route('admin.news.update', $news->ID_News), $updatedData);

        // Pastikan redirect berhasil
        $response->assertRedirect(route('admin.news.index'));

        // Pastikan data diupdate di database
        assertDatabaseHas('news', [
            'ID_News' => $news->ID_News,
            'News_Title' => 'Updated Title',
            'News_Content' => 'Updated Content',
        ]);
    });

    // DELETE
    it("allows a $roleName to delete news", function () use ($roleName) {
        // Buat user dengan role tertentu
        $user = User::factory()->create([
            'username' => env("API_USERNAME_{$roleName}"),
            'password' => bcrypt(env("API_PASSWORD_{$roleName}")),
        ]);

        // Assign role
        $role = Role::findByName($roleName);
        $user->assignRole($role);

        // Login sebagai user
        actingAs($user);

        // Buat data berita untuk diuji
        $news = News::create([
            'News_Title' => 'Delete Title',
            'News_Content' => 'Delete Content',
            'Publication_Date' => now()->toDateString(),
            'News_Image' => UploadedFile::fake()->create('news_image.jpg', 100),
            'user_id' => $user->id, // Pastikan user yang membuat
        ]);

        // Kirim permintaan delete
        $response = delete(route('admin.news.destroy', $news->ID_News));

        // Pastikan redirect berhasil
        $response->assertRedirect(route('admin.news.index'));

        // Pastikan data dihapus dari database
        assertDatabaseMissing('news', [
            'ID_News' => $news->ID_News,
        ]);
    });
}
