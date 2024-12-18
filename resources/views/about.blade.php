@extends('layouts.main')
@section('title', 'Hasanuddin University - About')
@section('content')
<div class="bg-gradient-to-r from-blueSecondary to-blueThird text-white py-20">
    <div class="container mx-auto px-4">
        <div class="text-center" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Welcome to Hasanuddin University International Class</h1>
            <p class="text-lg mb-8">
                A modern, innovative, inclusive, multicultural, and globally-oriented campus that covers various fields
                of study. With a commitment to producing graduates with high competitiveness in the international arena,
                UNHAS continues to strengthen its position as one of the leading educational centers in Southeast Asia
                and the world.
            </p>
        </div>
    </div>
</div>
    <div class="container mx-auto py-20 px-4" data-aos="fade-up">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-5xl font-bold mb-6">Our History</h2>
            <p class="text-xl text-indigo-950">
                Established in 2006, the Hasanuddin University International Class was launched as part of UNHAS's vision to
                become a world-class university. The program aims to meet the increasing demand for high-quality education
                that can compete internationally and facilitate academic mobility for both local and foreign students,
                contributing to the development of science and technology at the global level.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
            <div class="card bg-base-100 shadow-xl" data-aos="fade-right">
                <div class="card-body">
                    <h2 class="card-title text-4xl md:text-5xl font-bold text-indigo-950">Vision</h2>
                    <p class="text-xl text-indigo-950">
                        To become a center of excellence in international education, producing competent graduates who are
                        ready to compete in the global market, while leveraging the potential of the Indonesian Maritime
                        Continent.
                    </p>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl" data-aos="fade-left">
                <div class="card-body">
                    <h2 class="card-title text-4xl md:text-5xl font-bold text-indigo-950">Mission</h2>
                    <ul class="text-xl text-indigo-950 list-disc list-inside">
                        <li class="mb-4">
                            To provide a learning environment based on foreign languages that enhances the capacity of
                            innovative, adaptive, and globally-oriented learners.
                        </li>
                        <li class="mb-4">
                            To establish international collaborations with universities and global institutions to expand
                            students' perspectives and experiences.
                        </li>
                        <li>
                            To foster the development of knowledge, skills, and expertise in students, supporting global
                            progress with a focus on the Indonesian Maritime Continent as a hub of innovation and
                            international education.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container mx-auto py-20 px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold">Our Facilities</h2>
                <p class="text-xl text-indigo-950 mb-8">
                    The International Class at Hasanuddin University offers cutting-edge facilities designed to enhance the
                    academic experience, promote collaboration, and foster excellence in education.
                </p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                <div class="bg-white text-indigo-950 rounded-lg shadow-lg p-6"  data-aos="flip-left">
                    <h3 class="text-2xl font-bold mb-2">Laboratories</h3>
                    <p>State-of-the-art laboratories for hands-on learning and research.</p>
                </div>
                <div class="bg-white text-indigo-950 rounded-lg shadow-lg p-6"  data-aos="flip-left" data-aos-delay="100">
                    <h3 class="text-2xl font-bold mb-2">Library</h3>
                    <p>Extensive library resources for academic enrichment.</p>
                </div>
                <div class="bg-white text-indigo-950 rounded-lg shadow-lg p-6"  data-aos="flip-left" data-aos-delay="100">
                    <h3 class="text-2xl font-bold mb-2">Seminar Room</h3>
                    <p>Dedicated spaces for seminars, workshops, and conferences.</p>
                </div>
                <div class="bg-white text-indigo-950 rounded-lg shadow-lg p-6"  data-aos="flip-left" data-aos-delay="100">
                    <h3 class="text-2xl font-bold mb-2">Faculty Room</h3>
                    <p>Collaborative workspaces for faculty members.</p>
                </div>
                <div class="bg-white text-indigo-950 rounded-lg shadow-lg p-6"  data-aos="flip-left" data-aos-delay="100">
                    <h3 class="text-2xl font-bold mb-2">International Classrooms</h3>
                    <p>Modern classrooms designed for a global learning experience.</p>
                </div>
                <div class="bg-white text-indigo-950 rounded-lg shadow-lg p-6"  data-aos="flip-left" data-aos-delay="100">
                    <h3 class="text-2xl font-bold mb-2">Evacuation Routes</h3>
                    <p>Well-marked evacuation routes for emergency preparedness.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
