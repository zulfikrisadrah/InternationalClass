    import './bootstrap';

    import Alpine from 'alpinejs';
    import AOS from 'aos';
    import 'aos/dist/aos.css'; // Import file CSS AOS

    AOS.init(); // Inisialisasi AOS
    window.Alpine = Alpine;

    Alpine.start();
