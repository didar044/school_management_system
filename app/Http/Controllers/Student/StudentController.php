<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\Student;
use Illuminate\Http\Request;
use App\Models\Batch\Shift;
use App\Models\Batch\Classe;
use App\Models\Batch\Section;

class StudentController extends Controller
{
        public function index(Request $request)
        {    
                $query = Student::with('class', 'shift');

             
                if ($request->filled('student_id')) {
                    $query->where('id', $request->student_id);
                }

              
                if ($request->filled('student_name')) {
                    $query->where('name', 'like', '%' . $request->student_name . '%');
                }
                $students = $query->latest()->paginate(10);
                  return view('pages.school.student.index', compact("students"));

        }
    

  
    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        
    }

   
    public function show(string $id)
    {
        $students=Student::find($id);
         return view('pages.school.student.show', compact("students"));

    }

    
    public function edit(string $id)
    {   
        $students=Student::find($id);
        $shifts=Shift::all();
        $classes=Classe::all();
        $sections=Section::all();
        return view('pages.school.student.edit',["students"=>$students,"shifts"=>$shifts,"classes"=>$classes,"sections"=>$sections]);
    }

    
    public function update(Request $request, string $id)
    {   
        $student=Student::findOrFail($id);
        $student->classe_id=$request->class_id;
        $student->shift_id=$request->shift_id;
        $student->section_id=$request->section_id;
        $student->roll_number=$request->roll_number;
        $student->session=$request->session;
        $student->name=$request->name;
        $student->father_name=$request->father_name;
        $student->mother_name=$request->mother_name;
        $student->dof=$request->dof;
        $student->dob_reg=$request->dob_reg;
        $student->blood_group=$request->blood_group;
        $student->gender=$request->gender;
        $student->religion=$request->religion;
     // $student->photo=$request->photo;
        $student->mobile_number=$request->mobile_number;
        $student->email=$request->email;
        $student->address=$request->address;
        $student->save();
          
        if($request->hasFile('photo')){
            $imagename=$student->id.'.'.$request->photo->extension();
            $request->photo->move(public_path('image/appplication_img'),$imagename);
            $student->photo=$imagename;
            $student->update();
            
        }
        
        
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student=Student::find($id);
        $student->delete();
        return redirect('/students');
    }
}
