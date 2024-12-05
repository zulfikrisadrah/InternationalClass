<?php
use App\Models\User;
use App\Models\Staff;
use App\Models\IeProgram;
use App\Models\StudyProgram;
use App\Models\Faculty;
use App\Models\Program;
use function Pest\Laravel\{post, get, put, delete};
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use Spatie\Permission\Models\Role;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Pastikan role 'admin' dan 'staff' sudah ada di tabel roles
    $adminRole = Role::firstOrCreate(['name' => 'admin']);
    $staffRole = Role::firstOrCreate(['name' => 'staff']);

    // Pastikan izin untuk manage news ada
    $permissions = Permission::firstOrCreate(['name' => 'manage program']);

    // Tambahkan izin ke role admin dan staff
    $adminRole->givePermissionTo($permissions);
    $staffRole->givePermissionTo($permissions);
});

$roles = ['admin', 'staff']; // Daftar peran yang akan diuji

foreach ($roles as $roleName) {

    // Test for index view (list programs)
    // CREATE Program
    it("allows a $roleName to create program", function () use ($roleName) {
        // Membuat user dengan peran tertentu
        $user = User::factory()->create([
            'username' => env("API_USERNAME_{$roleName}"),
            'password' => bcrypt(env("API_PASSWORD_{$roleName}")),
        ]);

        // Tetapkan peran ke user
        $role = Role::findByName($roleName);
        $user->assignRole($role);

        // Login sebagai user
        actingAs($user)
            ->get(route('admin.program.create'))  // Akses halaman create
            ->assertStatus(200);

        // Membuat data IeProgram, Faculty, StudyProgram, dan Staff
        $ieProgram = IeProgram::create(['ie_program_name' => 'Internship Programs']);
        $faculty = Faculty::create([
            'Faculty_Name' => 'MATEMATIKA DAN ILMU PENG. ALAM',
            'Faculty_Code' => 'H',
        ]);
        $studyProgram = StudyProgram::create([
            'study_program_Name' => 'Sistem Informasi',
            'degree' => 'S1',
            'ID_Faculty' => $faculty->ID_Faculty,
        ]);
        $staff = Staff::create([
            'Staff_Name' => 'staff_1',
            'user_id' => $user->id,
            'ID_study_program' => $studyProgram->ID_study_program,
        ]);

        // Data untuk membuat program
        $programData = [
            'program_Name' => 'Testing Create Program',
            'Country_of_Execution' => 'Test Country',
            'Execution_Date' => now()->toDateString(),
            'Participants_Count' => 30,
            'program_Image' => UploadedFile::fake()->create('program_image.jpg', 100),
            'ID_Ie_program' => $ieProgram->id,
            'ID_study_program' => $studyProgram->ID_study_program,
            'ID_Staff' => $staff->id,
        ];

        // Kirim request untuk membuat program
        $response = post(route('admin.program.store'), $programData);

        // Pastikan redirect dan pesan sukses
        $response->assertStatus(302)
            ->assertRedirect(route('admin.program.index'));

        // Pastikan data ada di database
        assertDatabaseHas('programs', [
            'program_Name' => 'Testing Create Program',
            'ID_Staff' => $staff->id,
        ]);
    });


    // Test for create program (form to create new program)
    it("allows a $roleName user to view the program list", function () use ($roleName) {
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
            ->get(route('admin.program.create'))  // Akses halaman create
            ->assertStatus(200);

        // Membuat data IeProgram, Faculty, StudyProgram, dan Staff
        $ieProgram = IeProgram::create(['ie_program_name' => 'Internship Programs']);
        $faculty = Faculty::create([
            'Faculty_Name' => 'MATEMATIKA DAN ILMU PENG. ALAM',
            'Faculty_Code' => 'H',
        ]);
        $studyProgram = StudyProgram::create([
            'study_program_Name' => 'Sistem Informasi',
            'degree' => 'S1',
            'ID_Faculty' => $faculty->ID_Faculty,
        ]);
        $staff = Staff::create([
            'Staff_Name' => 'staff_1',
            'user_id' => $user->id,
            'ID_study_program' => $studyProgram->ID_study_program,
        ]);

        // Akses halaman daftar program
        $response = get(route('admin.program.index'));

        // Pastikan halaman dapat diakses dengan status OK
        $response->assertStatus(200);
        $response->assertSee('Manage Program'); // Sesuaikan dengan teks yang ada pada halaman daftar program
    });

    it("allows a $roleName user to update a program", function () use ($roleName) {
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
            ->get(route('admin.program.create'))  // Akses halaman create
            ->assertStatus(200);

        // Buat data IeProgram yang valid
        $ieProgram = IeProgram::create([
            'ie_program_name' => 'Internship Program',
        ]);

        // Buat data Faculty yang valid
        $faculty = Faculty::create([
            'Faculty_Name' => 'Faculty of Science',
            'Faculty_Code' => 'FOS',
        ]);

        // Buat data Study Program yang valid
        $studyProgram = StudyProgram::create([
            'study_program_Name' => 'Information Systems',
            'degree' => 'S1',
            'ID_Faculty' => $faculty->ID_Faculty,
        ]);

        // Buat data Staff yang valid
        $staff = Staff::create([
            'Staff_Name' => 'Staff Name 1',
            'user_id' => $user->id,
            'ID_study_program' => $studyProgram->ID_study_program,
        ]);

        // Buat data program yang valid
        $program = Program::create([
            'program_Name' => 'Old Program Title',
            'Country_of_Execution' => 'Old Country',
            'Execution_Date' => now()->toDateString(),
            'Participants_Count' => 100,
            'program_Image' => UploadedFile::fake()->create('program_image.jpg', 100),
            'ID_Ie_program' => $ieProgram->id,
            'ID_Staff' => $staff->id,
            'ID_study_program' => $studyProgram->ID_study_program,
        ]);

        // Data yang akan diperbarui
        $updatedData = [
            'program_Name' => 'Updated Program Title',
            'Country_of_Execution' => 'Updated Country',
            'Execution_Date' => now()->toDateString(),
            'Participants_Count' => 150,
            'program_Image' => UploadedFile::fake()->create('program_image.jpg', 100),
            'ID_Ie_program' => $ieProgram->id,
        ];

        // Kirim data untuk memperbarui program
        $response = put(route('admin.program.update', $program->ID_program), $updatedData);

        // Pastikan status sukses (redirect atau status yang sesuai)
        $response->assertStatus(302);
        $response->assertSessionHas('success', 'program updated successfully.');

        // Pastikan data diperbarui di database
        assertDatabaseHas('programs', [
            'program_Name' => 'Updated Program Title',
            'Country_of_Execution' => 'Updated Country',
            'Execution_Date' => now()->toDateString(),
            'Participants_Count' => 150,
        ]);
    });

    it("allows a $roleName user to delete a program", function () use ($roleName) {
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
            ->get(route('admin.program.create'))  // Akses halaman create
            ->assertStatus(200);

        // Buat data IeProgram yang valid
        $ieProgram = IeProgram::create([
            'ie_program_name' => 'Internship Program',
        ]);

        // Buat data Faculty yang valid
        $faculty = Faculty::create([
            'Faculty_Name' => 'Faculty of Engineering',
            'Faculty_Code' => 'FOE',
        ]);

        // Buat data Study Program yang valid
        $studyProgram = StudyProgram::create([
            'study_program_Name' => 'Computer Science',
            'degree' => 'S1',
            'ID_Faculty' => $faculty->ID_Faculty,
        ]);

        // Buat data Staff yang valid
        $staff = Staff::create([
            'Staff_Name' => 'Staff Name 2',
            'user_id' => $user->id,
            'ID_study_program' => $studyProgram->ID_study_program,
        ]);

        // Buat data program yang valid
        $program = Program::create([
            'program_Name' => 'Program to Delete',
            'Country_of_Execution' => 'Country to Delete',
            'Execution_Date' => now()->toDateString(),
            'Participants_Count' => 50,
            'program_Image' => UploadedFile::fake()->create('program_image.jpg', 100),
            'ID_Ie_program' => $ieProgram->id,
            'ID_Staff' => $staff->id,
            'ID_study_program' => $studyProgram->ID_study_program,
        ]);

        // Kirim request untuk menghapus program
        $response = delete(route('admin.program.destroy', $program->ID_program));

        // Pastikan status sukses (redirect atau status yang sesuai)
        $response->assertStatus(302);
        $response->assertSessionHas('success', 'Program deleted successfully.');

        // Pastikan data program dihapus dari database
        assertDatabaseMissing('programs', [
            'ID_Program' => $program->ID_program,
        ]);
    });


}

