<!-- resources/views/partials/header.blade.php -->
<header>
    <!-- Top Navbar -->
    <div class="bg-redSecondary text-white py-2">
        <div class="container mx-auto flex justify-center items-center px-6">
            <nav class="flex space-x-6 ">
                <a href="https://neosia.unhas.ac.id/login" class="hover:text-gray-900">Portal Mahasiswa</a>
                <a href="https://sikola-v2.unhas.ac.id/login/index.php" class="hover:text-gray-900">Sikola</a>
                <a href="https://journal.unhas.ac.id/" class="hover:text-gray-900">Jurnal</a>
            </nav>
        </div>
    </div>

    <!-- Main Navbar -->
    <div class="bg-redPrimary text-white py-4" style="box-shadow: 0 -2px 18px rgba(0, 0, 0, 0.2);">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="/">
                <div class="flex items-center gap-4">
                    <img src="images/logoUnhas.png" alt="Logo" class="w-10">
                    <div class="w-px h-8 bg-white"></div>
                    <span class="font-semibold text-xs">Kelas Internasional <br> Universitas Hasanuddin</span>
                </div>
            </a>
            <nav class="flex space-x-6">
                <a href="/about" class="hover:text-gray-900">About</a>
                <div class="dropdown dropdown-hover">
                    <div tabindex="0" role="button" class="hover:text-gray-900">Program</div>
                    <ul tabindex="0"
                        class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow text-black">
                        <li><a href="/studyProgram">Study Program</a></li>
                        <li><a href="/IE">International exposure program</a></li>
                    </ul>
                </div>
                <div class="dropdown dropdown-hover">
                    <div tabindex="0" role="button" class="hover:text-gray-900">Information</div>
                    <ul tabindex="0"
                        class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow text-black">
                        <li><a href="/news">News</a></li>
                        <li><a href="/event">Event</a></li>
                    </ul>
                </div>
            </nav>
            <button class="text-white px-4 py-2 rounded-md hover:text-gray-900"><a href="/login">Login</a></button>
        </div>
    </div>
</header>
