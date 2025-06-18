<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Student;
use App\Models\Batch\Classe;
use App\Models\Batch\Section;
use App\Models\Attendance\StudentAttendance;
use App\Models\Batch\Shift;


class StudentAttendanceController extends Controller
{

    public function index(Request $request)
        {
            $search = $request->input('search');

            $query = StudentAttendance::with('class', 'shift', 'student', 'section')->orderByDesc('date');

            if (!empty($search)) {
                $query->where('student_id', $search);
            }

            $studentattendances = $query->paginate(10);

            return view('pages.attendance.studentattendance.index', compact('studentattendances', 'search'));
        }


    public function create(Request $request)
        {
            $students = Student::query();

            
            if ($request->filled('student_id')) {
                $students->where('id', $request->student_id);
            }

            
            if ($request->filled('classes')) {
                $students->where('classe_id', $request->classes);
            }

        
            if ($request->filled('section')) {
                $students->where('section_id', $request->section);
            }

            
            if ($request->filled('shift')) {
                $students->where('shift_id', $request->shift);
            }

           
            if ($request->filled('st_name')) {
                $students->where('name', 'like', '%' . $request->st_name . '%');
            }

     
            $students = $students->with(['class', 'section', 'shift'])->get();

           
            $classes = Classe::all();
            $shifts = Shift::all();

            
            if ($request->filled('shift')) {
                $sections = Section::where('shift_id', $request->shift)->get();
            } else {
                $sections = Section::all();
            }

            return view('pages.attendance.studentattendance.create', compact(
                'students', 'classes', 'shifts', 'sections'
            ));
        }

   
    public function store(Request $request)
            {
                $request->validate([
                    'date' => 'required|date',
                    'students' => 'required|array',
                ]);

                foreach ($request->students as $studentId => $data) {
                    
                    StudentAttendance::updateOrCreate(
                        [
                            'student_id' => $data['student_id'],
                            'date' => $request->date
                        ],
                        [
                            'class_id' => $data['classe_id'],
                            'section_id' => $data['section_id'],
                            'shift_id' => $data['shift_id'],
                            'in_time' => $data['in_time'] ?? null,
                            'out_time' => $data['out_time'] ?? null,
                            'status' => $data['status'] ?? 'absent',
                            'remark' => $data['remark'] ?? null,
                        ]
                    );
                }

                return redirect()->route('studentattendances.create')
                    ->with('success', 'Attendance saved successfully.');
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
        $studentattendances = StudentAttendance::with('class', 'shift', 'student', 'section')->find($id);

           return view('pages.attendance.studentattendance.edit',["studentattendances"=>$studentattendances]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            
            $attendance = StudentAttendance::findOrFail($id);

          
            $attendance->student_id = $request->student_id;
            $attendance->date = $request->date;
            $attendance->status = $request->status;
            $attendance->in_time = $request->in_time;
            $attendance->out_time = $request->out_time;
            $attendance->remark = $request->remark;

            $attendance->save();

         
            return redirect()->route('studentattendances.index')->with('success', 'Student attendance updated successfully.');
    }

    
    public function destroy(string $id)
    {
        $studentattendances = StudentAttendance::find($id);
        $studentattendances ->delete();
        return redirect('/studentattendances')->with('success');
    }
}
