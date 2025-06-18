<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam\StudentExamSchedule;
use App\Models\Exam\StudentExamType;
use App\Models\Batch\Classe;
use App\Models\Batch\Section;
use App\Models\Batch\Shift;
use App\Models\Schedule\Room;
use App\Models\Schedule\Subject;
class StudentExamScheduleController extends Controller
{
   
   
   public function index(Request $request)
        {
            $request->validate([
                'classe_id' => 'nullable|integer',
                'exam_year' => 'nullable|digits:4',
                'student_exam_type_id' => 'nullable|integer',
            ]);

            $query = StudentExamSchedule::with('shift','studentexamtype','section','classe','subject');

            if ($request->filled('classe_id')) {
                $query->where('classe_id', $request->classe_id);
            }

            if ($request->filled('exam_year')) {
                $query->where('exam_year', $request->exam_year);
            }

            if ($request->filled('student_exam_type_id')) {
                $query->where('student_exam_type_id', $request->student_exam_type_id);
            }

            $studentexamschedules = $query->paginate(10);

            $studentexamtypes = StudentExamType::all();
            $classes = Classe::all();

            return view('pages.exam.studentexamschedule.index', compact('studentexamschedules', 'classes', 'studentexamtypes'));
    }


   
    public function create()
    {   
        $studentexamtypes=StudentExamType::all();
        $classes=Classe::all();
        $sections=Section::all();
        $shifts=Shift::all();
        $rooms=Room::all();
        $subjects=Subject::all();
        
        return view('pages.exam.studentexamschedule.create',compact( 'studentexamtypes','classes','sections','shifts','rooms','subjects'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $studentexamschedules=new StudentExamSchedule();
        $studentexamschedules->student_exam_type_id = $request->student_exam_type_id;
        $studentexamschedules->classe_id = $request->classe_id;
        $studentexamschedules->subject_id = $request->subject_id;
        $studentexamschedules->room_id = $request->room_id;
        $studentexamschedules->exam_date = $request->exam_date;
        $studentexamschedules->start_time = $request->start_time;
        $studentexamschedules->end_time = $request->end_time;
        $studentexamschedules->shift_id = $request->shift_id;
        $studentexamschedules->section_id = $request->section_id;
        $studentexamschedules->exam_year = $request->exam_year;
        $studentexamschedules->save();

        return redirect('/studentexamschedules');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    { 
        $studentexamschedules=StudentExamSchedule::find($id);
        $studentexamtypes=StudentExamType::all();
        $classes=Classe::all();
        $sections=Section::all();
        $shifts=Shift::all();
        $rooms=Room::all();
        $subjects=Subject::all();
        return view('pages.exam.studentexamschedule.edit',compact('studentexamschedules','studentexamtypes','classes','sections','shifts','rooms','subjects' ));
    }

    
    public function update(Request $request, string $id)
    {
        $studentexamschedule=StudentExamSchedule::findOrFail($id);
        $studentexamschedule->student_exam_type_id = $request->student_exam_type_id;
        $studentexamschedule->classe_id = $request->classe_id;
        $studentexamschedule->subject_id = $request->subject_id;
        $studentexamschedule->room_id = $request->room_id;
        $studentexamschedule->exam_date = $request->exam_date;
        $studentexamschedule->start_time = $request->start_time;
        $studentexamschedule->end_time = $request->end_time;
        $studentexamschedule->shift_id = $request->shift_id;
        $studentexamschedule->section_id = $request->section_id;
        $studentexamschedule->exam_year = $request->exam_year;
        $studentexamschedule->save();

        return redirect('/studentexamschedules');

    }

    
    public function destroy(string $id)
    {
        $studentexamschedule=StudentExamSchedule::find($id);
        $studentexamschedule->delete();
        return redirect('/studentexamschedules');
    }
}
