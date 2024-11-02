<!-- resources/views/home.blade.php -->
@extends('layouts.main')

@section('title', 'Hasanuddin University')

@section('content')
<!-- Content Section -->
<main class="py-16 bg-gray-100">
    <div class="container mx-auto px-6">
        <!-- resources/views/about.blade.php -->
<section class="rounded-lg py-3">
    <div class="flex flex-wrap lg:flex-nowrap gap-5">
        <!-- Image Column -->
        <div class="w-full lg:w-5/12">
            <img src="images/imageAbout.png"
                 class="w-full rounded-lg object-contain"
                 style="aspect-ratio: 1.52;"
                 alt="About us illustration" />
        </div>

        <!-- Text Column -->
        <div class="w-full lg:w-7/12">
            <h2 class="text-6xl font-bold text-bluePrimary pb-12">About</h2>
            <p class="text-black mt-32 lg:mt-0">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
    </div>
</section>


        <!-- International Exposure Program Section -->
        <h2 class="text-3xl font-semibold mt-12">International Exposure Program</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            <div class="bg-redThird text-center p-6 rounded-lg">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/df0b7c0c0020c3ae5a554e58ab907641b00d2291f195b9b5ca7128338c5f4ffd" alt="Sit In Program" class="w-16 mx-auto">
                <h3 class="mt-4 font-semibold text-white">Sit In Program</h3>
            </div>
            <div class="bg-blue-900 text-center p-6 rounded-lg">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/47e6af7cc8fadc5828c8244b462f1a80a0aea738074ed752ec91776733d45173" alt="Internship Program" class="w-16 mx-auto">
                <h3 class="mt-4 font-semibold text-white">Internship Program</h3>
            </div>
            <div class="bg-redThird text-center p-6 rounded-lg">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/0506d877ca2e563c8f523a082e12915878ea2d34b9cff913bd70cfbc47abfe45" alt="Short Course" class="w-16 mx-auto">
                <h3 class="mt-4 font-semibold text-white">Short Course</h3>
            </div>
            <div class="bg-blue-900 text-center p-6 rounded-lg">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/0a91bf3fedbda6671bdbc280e33e3d35f2a01d8a849f89fdf9954da5a5486943" alt="Enrichment Program" class="w-16 mx-auto">
                <h3 class="mt-4 font-semibold text-white">Enrichment Program</h3>
            </div>
        </div>

        <p class="mt-6 text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tristique, tortor nec consequat vulputate.</p>
        <ul class="list-disc pl-6 mt-4">
            <li>Student Exchange Program</li>
            <li>Sit In Program</li>
            <li>Summer Course</li>
            <li>Enrichment Program</li>
        </ul>

        <!-- Study Program Section -->
        <h2 class="text-3xl font-semibold mt-12">Study Program</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            <!-- Program Cards -->
            <div class="bg-blue-900 text-white p-6 rounded-lg shadow-lg">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/9a6311d2bc77ac0ce04057a03c68f7aa1f160bf7fc75a82b4b986fb9fac20163" alt="S1 Pendidikan Dokter" class="w-full h-40 object-cover rounded-t-lg">
                <h3 class="mt-4 text-lg font-semibold">S1 Pendidikan Dokter</h3>
                <p class="text-sm">Fakultas Kedokteran</p>
            </div>
            <div class="bg-blue-900 text-white p-6 rounded-lg shadow-lg">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/f46da08090b20599e79439a203fbed6eb8eb4ffac71b1f7787e72feefe0ce7fd" alt="S1 Pendidikan Dokter Gigi" class="w-full h-40 object-cover rounded-t-lg">
                <h3 class="mt-4 text-lg font-semibold">S1 Pendidikan Dokter Gigi</h3>
                <p class="text-sm">Fakultas Kedokteran Gigi</p>
            </div>
            <!-- Add other program cards as needed -->
        </div>

        <!-- News and Events Section -->
        <section class="py-16 bg-gray-200">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-semibold text-center mb-12">News and Events</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- News Card -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/aa842f41a05af1ed43e7673b4319d32ccdaba43e965b9520bc1f4ce390add765" alt="News Image" class="w-full h-40 object-cover rounded-t-lg">
                        <p class="text-xs text-gray-500 mt-2">May 13, 2024</p>
                        <h3 class="mt-4 font-semibold">Prof. Dr. Saeed Ahmad Buzdar along with the faculty...</h3>
                        <p class="mt-2 text-sm text-gray-600">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty of Physical and Mathematical Sciences...</p>
                        <button class="mt-4 bg-blue-700 text-white py-2 px-4 rounded-md">Read more</button>
                    </div>
                    <!-- Repeat for other news cards... -->
                </div>
            </div>
        </section>

        <!-- Join Us Section -->
        <section class="py-16 bg-blue-900 text-white">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="relative h-96">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/dd911cac4b9f4c4394728be11a7c57adf3d4ef90e43466ff087f87d239cd5ab4" alt="Join Us Background" class="absolute inset-0 w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="flex flex-col justify-center">
                        <h2 class="text-3xl font-semibold mb-4">Join With Us!</h2>
                        <p class="mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tristique, tortor nec consequat vulputate.</p>
                        <button class="bg-white text-blue-900 font-bold py-2 px-4 rounded-full">Registration</button>
                        <div class="mt-6 space-y-4">
                            <div class="bg-gray-100 text-blue-900 p-4 rounded-md flex justify-between items-center">
                                <h3 class="text-lg font-semibold">Requirements</h3>
                                <span class="text-2xl">+</span>
                            </div>
                            <div class="bg-gray-100 text-blue-900 p-4 rounded-md flex justify-between items-center">
                                <h3 class="text-lg font-semibold">General Requirements</h3>
                                <span class="text-2xl">+</span>
                            </div>
                            <div class="bg-gray-100 text-blue-900 p-4 rounded-md flex justify-between items-center">
                                <h3 class="text-lg font-semibold">Registration Procedures</h3>
                                <span class="text-2xl">+</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

@endsection
