<section class="flex flex-col justify-end bg-cover bg-center text-white relative overflow-hidden"
    style="background-image: url('images/hero.png'); height: calc(100vh - 110px);">
    <!-- Overlay Effect -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-black/10"></div>

    <!-- Content -->
    <div data-aos="fade-up-right" class="relative container mx-auto px-6 pb-12 z-10">
        <h1 class="text-5xl font-semibold animate-slide-in">{{ $data['title'] ?? '' }}</h1>
        <p class="mt-4 text-lg animate-fade-in">{{ $data['description'] ?? '' }}</p>
    </div>
</section>
