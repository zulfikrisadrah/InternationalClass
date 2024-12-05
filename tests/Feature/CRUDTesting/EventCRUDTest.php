<?php

use App\Models\Event;
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

$roles = ['admin', 'staff']; // Daftar peran yang dapat membuat event

foreach ($roles as $roleName) {
    it("allows a $roleName to create event", function () use ($roleName) {
        // Membuat user dengan peran tertentu
        $user = User::factory()->create([
            'username' => env("API_USERNAME_{$roleName}"),
            'password' => bcrypt(env("API_PASSWORD_{$roleName}")),
        ]);

        // Ambil role berdasarkan nama peran
        $role = Role::findByName($roleName);
        $user->assignRole($role); // Pastikan pengguna memiliki peran yang sesuai

        // Login sebagai user dengan peran tertentu
        actingAs($user)
            ->get(route('admin.event.create'))  // Akses halaman create
            ->assertStatus(200);

        // Data untuk membuat event
        $eventData = [
            'Event_Title' => 'Testing Create Event Title',
            'Event_Content' => 'Testing Create Event Content',
            'Publication_Date' => now()->toDateString(),
            'Event_Image' => UploadedFile::fake()->create('event_image.jpg', 100),  // Menggunakan file .jpg palsu
        ];

        // Kirim data untuk membuat event
        $response = actingAs($user)
            ->post(route('admin.event.store'), $eventData);

        // Pastikan status sukses (redirect atau status yang sesuai)
        $response->assertStatus(302); // Biasanya setelah berhasil, akan ada redirect

        // Pastikan data ada di database
        assertDatabaseHas('events', [
            'Event_Title' => 'Testing Create Event Title',
            'Event_Content' => 'Testing Create Event Content',
        ]);
    });

    it("allows a $roleName to view the event index", function () use ($roleName) {
        // Membuat user dengan peran tertentu
        $user = User::factory()->create([
            'username' => env("API_USERNAME_{$roleName}"),
            'password' => bcrypt(env("API_PASSWORD_{$roleName}")),
        ]);

        // Ambil role berdasarkan nama peran
        $role = Role::findByName($roleName);
        $user->assignRole($role); // Pastikan pengguna memiliki peran yang sesuai

        // Login sebagai user dengan peran tertentu
        actingAs($user);

        // Buat data Event untuk ditampilkan
        Event::create([
            'Event_Title' => 'Testing Create Event Title',
            'Event_Content' => 'Testing Create Event Content',
            'Publication_Date' => now()->toDateString(),
            'Event_Image' => UploadedFile::fake()->create('event_image.jpg', 100),  // Menggunakan file .jpg palsu
            'user_id' => $user->id,
        ]);

        // Akses halaman index
        $response = get(route('admin.event.index'));

        // Pastikan status 200
        $response->assertStatus(200);

        // Pastikan event yang dibuat muncul di halaman
        $response->assertSee('Testing Create Event Title');
    });

        // UPDATE Event
        it("allows a $roleName to update event", function () use ($roleName) {
            // Membuat user dengan peran tertentu
            $user = User::factory()->create([
                'username' => env("API_USERNAME_{$roleName}"),
                'password' => bcrypt(env("API_PASSWORD_{$roleName}")),
            ]);
    
            // Ambil role berdasarkan nama peran
            $role = Role::findByName($roleName);
            $user->assignRole($role); // Pastikan pengguna memiliki peran yang sesuai
    
            // Login sebagai user dengan peran tertentu
            actingAs($user);
    
            // Buat data Event untuk diperbarui
            $event = Event::create([
                'Event_Title' => 'Testing Create Event Title',
                'Event_Content' => 'Testing Create Event Content',
                'Publication_Date' => now()->toDateString(),
                'Event_Image' => UploadedFile::fake()->create('event_image.jpg', 100),  // Menggunakan file .jpg palsu
                'user_id' => $user->id,
            ]);
    
            // Data untuk pembaruan
            $updatedData = [
                'Event_Title' => 'Updated Title',
                'Event_Content' => 'Updated content for the event',
                'Publication_Date' => now()->toDateString(),
                'Event_Image' => UploadedFile::fake()->create('event_image.jpg', 100),  // Menggunakan file .jpg palsu
            ];
    
            // Kirim data untuk memperbarui event
            $response = put(route('admin.event.update', ['event' => $event->ID_Event]), $updatedData);  // Gunakan $event->ID_Event di sini
    
            // Pastikan redirect dan pesan sukses
            $response->assertRedirect(route('admin.event.index'));
            $response->assertSessionHas('success', 'Event updated successfully.');
    
            // Pastikan data diupdate di database
            assertDatabaseHas('events', [
                'Event_Title' => 'Updated Title',
                'Event_Content' => 'Updated content for the event',
            ]);
        });
    
        // DELETE Event
        it("allows a $roleName to delete event", function () use ($roleName) {
            // Membuat user dengan peran tertentu
            $user = User::factory()->create([
                'username' => env("API_USERNAME_{$roleName}"),
                'password' => bcrypt(env("API_PASSWORD_{$roleName}")),
            ]);
    
            // Ambil role berdasarkan nama peran
            $role = Role::findByName($roleName);
            $user->assignRole($role); // Pastikan pengguna memiliki peran yang sesuai
    
            // Login sebagai user dengan peran tertentu
            actingAs($user);
    
            // Buat data Event untuk dihapus
            $event = Event::create([
                'Event_Title' => 'Updated Title',
                'Event_Content' => 'Updated content for the event',
                'Publication_Date' => now()->toDateString(),
                'Event_Image' => UploadedFile::fake()->create('event_image.jpg', 100),  // Menggunakan file .jpg palsu
                'user_id' => $user->id,
            ]);
    
            // Kirim request untuk menghapus event
            $response = delete(route('admin.event.destroy', $event->ID_Event));
    
            // Pastikan redirect dan pesan sukses
            $response->assertRedirect(route('admin.event.index'));
            $response->assertSessionHas('success', 'Event deleted successfully.');
    
            // Pastikan data Event dihapus dari database
            assertDatabaseMissing('events', [
                'ID_Event' => $event->ID_Event,
            ]);
        });
}
