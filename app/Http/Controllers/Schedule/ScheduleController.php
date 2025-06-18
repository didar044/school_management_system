<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Batch\Section;
use App\Models\Batch\Shift;
use App\Models\Batch\Classe;
use App\Models\Schedule\Period;
use App\Models\Schedule\Room;
use App\Models\Schedule\Subject;
use App\Models\Employee\Employee;
use App\Models\Schedule\Schedule;

class ScheduleController extends Controller
{
    
    public function index(Request $request)
    {
            $day = $request->input('day');  
    
            $schedules = Schedule::with('shift', 'section', 'classe', 'period', 'subject', 'employee')
                ->where('day', $day)
                ->get();
            
            return view('pages.schedule.schedulemanage.index', compact('day', 'schedules'));
    }

  
    public function create()

    {
        $shifts = Shift::all();
        $classes=Classe::all();
        $periods=Period::all();
        $rooms=Room::where('description','Classroom')->get();
        $subjects=Subject::all();
        $employees = Employee::where('employee_categorie_id', 1)->get();
        return view('pages.schedule.schedulemanage.create',["shifts"=>$shifts,"classes"=>$classes,"rooms"=>$rooms,"subjects"=>$subjects,"employees"=>$employees,"periods"=>$periods]);
    
    }


    public function getSections($shift_id)
    {
        $sections = Section::where('shift_id', $shift_id)->get(['id', 'name']);
        return response()->json($sections);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $schedules=new Schedule();
        $schedules->day=$request->day;
        $schedules->classe_id=$request->class_id;
        $schedules->period_id=$request->period_id;
        $schedules->subject_id=$request->subject_id;
        $schedules->room_id=$request->room_id;
        $schedules->employee_id=$request->teacher_id;
        $schedules->shift_id=$request->shift_id;
        $schedules->section_id=$request->section_id;
        $schedules->save();
        return redirect('/schedulemanages');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $schedules=Schedule::find($id);
        $shifts = Shift::all();
        $classes=Classe::all();
        $periods=Period::all();
        $rooms=Room::where('description','Classroom')->get();
        $subjects=Subject::all();
        $employees = Employee::where('employee_categorie_id', 1)->get();
        return view('pages.schedule.schedulemanage.edit',["schedules"=>$schedules,"shifts"=>$shifts,"classes"=>$classes,"rooms"=>$rooms,"subjects"=>$subjects,"employees"=>$employees,"periods"=>$periods]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {    
        $schedule=Schedule::findOrFail($id);
        $schedule->day=$request->input('day');
        $schedule->classe_id=$request->input('class_id');
        $schedule->period_id=$request->input('period_id');
        $schedule->subject_id=$request->input('subject_id');
        $schedule->room_id=$request->input('room_id');
        $schedule->employee_id=$request->input('teacher_id');
        $schedule->shift_id=$request->input('shift_id');
        $schedule->section_id=$request->input('section_id');
        $schedule->save();
        return redirect('/schedulemanages');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedules=Schedule::find($id);
        $schedules->delete();
        return redirect('/schedulemanages');

    }

}
