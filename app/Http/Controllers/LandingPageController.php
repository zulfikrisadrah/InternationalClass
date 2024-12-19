<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Event;
use App\Models\IeProgram;
use App\Models\Program;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Stichoza\GoogleTranslate\GoogleTranslate;

class LandingPageController extends Controller
{
    public function index()
    {
        $tr = new GoogleTranslate('en');
        $tr->setOptions([
            'verify' => true,
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_SSL_VERIFYHOST => 2,
                CURLOPT_CAINFO => public_path('cacert.pem'),
            ]
        ]);

        $programs = StudyProgram::with('faculty')->get()->map(function($program) use ($tr) {
            if ($program->study_program_Name) {
                $cleanName = str_replace(' - S1', '', $program->study_program_Name);
                $program->translated_name = $tr->translate($cleanName);

                // Menambahkan translasi untuk nama fakultas
                if ($program->faculty && $program->faculty->Faculty_Name) {
                    $program->faculty->translated_name = $tr->translate($program->faculty->Faculty_Name);
                }
            } else {
                $program->translated_name = '';
            }
            return $program;
        });
        $news = News::latest()->take(3)->get(); // Mengambil 3 berita terbaru
        $events = Event::latest()->take(2)->get();
        $ie_programs = IeProgram::pluck('ie_program_name');

        $data = [
            'international_exposure_programs' => $ie_programs,
            'title' => 'International Class',
            'description' => 'Join our International Class to experience a world-class education, expert instructors, and a diverse community. Gain valuable skills, global insights, and hands-on learning opportunities that will prepare you for a bright future in an interconnected world.',
        ];

        return view('home', compact('programs', 'news', 'events', 'data' ));
    }

    public function studyProgram()
    {
        $tr = new GoogleTranslate('en');
        $tr->setOptions([
            'verify' => true,
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_SSL_VERIFYHOST => 2,
                CURLOPT_CAINFO => public_path('cacert.pem'),
            ]
        ]);

        $programs = StudyProgram::with('faculty')->get()->map(function($program) use ($tr) {
            if ($program->study_program_Name) {
                $cleanName = str_replace(' - S1', '', $program->study_program_Name);
                $program->translated_name = $tr->translate($cleanName);

                // Menambahkan translasi untuk nama fakultas
                if ($program->faculty && $program->faculty->Faculty_Name) {
                    $program->faculty->translated_name = $tr->translate($program->faculty->Faculty_Name);
                }
            } else {
                $program->translated_name = '';
            }
            return $program;
        });
        $ie_programs = IeProgram::pluck('ie_program_name');
        $data = [
            'title' => 'Study Program',
            'description' => 'The International Class is a program conducted in English or another foreign language,
            designed to equip graduates with the skills and language proficiency to compete globally. Students will
            engage in international exposure activities, such as joint degrees, double degrees, internships, or other
            opportunities at partner universities or institutions abroad.',
            'international_exposure_programs' => $ie_programs,
        ];

        return view('studyProgram.index', compact('programs', 'data'));
    }
    public function studyProgramShow($ID_study_program)
    {
        $tr = new GoogleTranslate('en');
        $tr->setOptions([
            'verify' => true,
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_SSL_VERIFYHOST => 2,
                CURLOPT_CAINFO => public_path('cacert.pem'),
            ]
        ]);

        $programs = StudyProgram::with('faculty', 'partnerships')->find($ID_study_program);
        if ($programs) {
            if ($programs->study_program_Name) {
                $cleanName = str_replace(' - S1', '', $programs->study_program_Name);
                $programs->translated_name = $tr->translate($cleanName);

                // Menambahkan translasi untuk nama fakultas
                if ($programs->faculty && $programs->faculty->Faculty_Name) {
                    $programs->faculty->translated_name = $tr->translate($programs->faculty->Faculty_Name);
                }
            } else {
                $programs->translated_name = '';
            }
        }
        $ie_programs = IeProgram::pluck('ie_program_name');
        $data = [
            'title' => $programs->translated_name,
        ];

        // Mengambil berita yang relevan dengan program studi
        $news = News::where('ID_study_program', $ID_study_program)
            ->latest()
            ->take(3)
            ->get();

        $events = Event::where('ID_study_program', $ID_study_program)
            ->latest()
            ->take(2)
            ->get();

        return view('studyProgram.show', compact('programs', 'data', 'news', 'events'));
    }

    // Untuk di halaman /news
    public function news()
    {
        $news_page = News::latest()->paginate(4);
        $popular_news_page = Cache::remember('news_popular', now()->addMinutes(10), function () {
            return News::orderBy('views', 'desc')->limit(4)->get();
        });
        $data = [
            'title' => 'News',
            'description' => 'Explore the latest updates from Hasanuddin University International Class,
            featuring student achievements, international collaborations, and important developments that
            showcase our dedication to global academic excellence.',
        ];

        return view('news.index', compact('news_page', 'popular_news_page', 'data'));
    }
    public function newsShow($ID_News)
    {
        $newsItem = News::findOrFail($ID_News);
        $newsItem->increment('views');
        Cache::forget('news_popular');

        $data = [
            'title' => 'News',
            'description' => 'Explore the latest updates from Hasanuddin University International Class,
            featuring student achievements, international collaborations, and important developments that
            showcase our dedication to global academic excellence.',
        ];

        return view('news.show', compact('newsItem', 'data'));
    }
    // Untuk di halaman /events
    public function event()
    {
        $events_page = Event::latest()->paginate(4);
        $upcoming_events_page = Event::where('Event_Date', '>=', now())
            ->latest()
            ->take(4)
            ->get();
        $data = [
            'title' => 'Event',
            'description' => 'Discover upcoming activities and programs from Hasanuddin University International Class.
            From academic workshops to cultural exchanges, these events are designed to enhance learning experiences,
            foster global connections, and celebrate our diverse community.',
        ];
        return view('event.index', compact('events_page', 'upcoming_events_page', 'data'));
    }
    public function eventShow($ID_Event)
    {
        $eventItem = Event::findOrFail($ID_Event);
        $data = [
            'title' => 'Event',
            'description' => 'Explore the latest updates from Hasanuddin University International Class,
            featuring student achievements, international collaborations, and important developments that
            showcase our dedication to global academic excellence.',
        ];

        return view('event.show', compact('eventItem', 'data'));
    }
    public function about()
    {
        $data = [
            'title' => 'About',
            'description' => 'The International Class at Hasanuddin University is a prestigious program
            established in 2006 to provide world-class education. It aims to produce globally competitive
            graduates through innovative learning, international collaborations, and a focus on the unique
            potential of the Indonesian Maritime Continent.',
        ];
        return view('about', compact('data'));
    }
    public function InternationalExposure()
    {
        $data = [
            'title' => 'International Exposure',
            'description' => 'Join our International Class to experience a world-class education, expert instructors, and a diverse community. Gain valuable skills, global insights, and hands-on learning opportunities that will prepare you for a bright future in an interconnected world.',
        ];
        $today = Carbon::today();

        $recommendedPrograms = Program::select('programs.*')
        ->leftJoin('program_enrollment', 'programs.ID_program', '=', 'program_enrollment.ID_program')
        ->join('program_study_program', 'programs.ID_program', '=', 'program_study_program.program_id')
        ->where('program_enrollment.status', 'approved')
        ->whereDate('programs.Execution_Date', '>', $today)
        ->groupBy(
            'programs.ID_program',
            'programs.program_Name',
            'programs.program_description',
            'programs.Country_of_Execution',
            'programs.Execution_Date',
            'programs.End_Date',
            'programs.Participants_Count',
            'programs.program_Image',
            'programs.ID_Ie_program',
            'programs.user_id',
            'programs.created_at',
            'programs.updated_at'
        )
        ->havingRaw('COUNT(program_enrollment.ID_Student) < programs.Participants_Count')
        ->orderByDesc(DB::raw('COUNT(program_enrollment.ID_Student)'))
        ->limit(5)
        ->get();

        $newPrograms = Program::latest()->limit(5)->get();

        $allPrograms = Program::latest()->paginate(5);
        return view('InternationalExposure.index', compact('recommendedPrograms', 'data','newPrograms', 'allPrograms'));
    }
    public function InternationalExposureShow($ID_program)
    {
        $programItem = Program::findOrFail($ID_program);
        $data = [
            'title' => 'International Exposure',
            'description' => 'Join our International Class to experience a world-class education, expert instructors, and a diverse community. Gain valuable skills, global insights, and hands-on learning opportunities that will prepare you for a bright future in an interconnected world.',
        ];

        return view('InternationalExposure.show', compact('data', 'programItem'));
    }
}
