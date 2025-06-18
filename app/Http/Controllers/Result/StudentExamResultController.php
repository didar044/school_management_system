<?php

namespace App\Http\Controllers\Result;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result\StudentExamResult;
use App\Models\Schedule\Subject;
use App\Models\Exam\StudentExamType;
use App\Models\Student\Student;
use Illuminate\Support\Facades\DB;
use App\Models\Result\StudentExamMarkDetail;

class StudentExamResultController extends Controller
{
    
    public function index()
    {
        $studentexamresults=StudentExamResult::all();
        return view('pages.result.studentexamresult.index',compact('studentexamresults'));
    }

   
    public function create()
    {    
       
        $subjects=Subject::all();
        $studentexamtypes=StudentExamType::all();
        $students=Student::all();
        
         return view('pages.result.studentexamresult.create',compact('subjects','studentexamtypes','students'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $result = StudentExamResult::create([
                'student_id' => $request->student_id,
                'student_exam_type_id' =>$request->student_exam_type_id,
                'exam_year' => $request->exam_year,
                'total_marks' => $request->total_marks,
                'average_marks' => $request->average_marks,
                'gpa' => $request->gpa,
                'grade' => $request->grade,
                'remark' => $request->remark,
            ]);

            $result->save();

            foreach ($request->subjects as $subject) {
                    \Log::info('Subject data:', $subject); // Good for debugging

                    // If sgpa is optional, don't throw error
                    $subject['sgpa'] = $subject['sgpa'] ?? 0;

                    $details = StudentExamMarkDetail::create([
                        'student_exam_result_id' => $result->id,
                        'student_exam_type_id' => $request->student_exam_type_id,
                        'subject_id' => $subject['subject_id'],
                        'written_marks' => $subject['written_marks'] ?? null,
                        'mcq_marks' => $subject['mcq_marks'] ?? null,
                        'w_m_marks' => $subject['w_m_marks'] ?? (($subject['written_marks'] ?? 0) + ($subject['mcq_marks'] ?? 0)),
                        'gpa' => $subject['sgpa'],
                        'grade' => $subject['sgrade'] ?? null,
                        'remark' => $subject['remarks'] ?? null,
                    ]);
                }

            DB::commit();
            return redirect('/studentexamresults')->with('success', 'Exam result saved successfully!');


        }catch (\Exception $e) {
                 DB::rollBack();
                \Log::error("Payment creation failed: " . $e->getMessage());
                return back()->withErrors(['error' => 'Payment failed: ' . $e->getMessage()]);
           }
    }

  
    public function show(string $id)
        {
         
            
           $studentExamResult = StudentExamResult::with([
                    'student.class',
                   
                    'markDetails.subject'
                ])->findOrFail($id);

            return view('pages.result.studentexamresult.show', compact('studentExamResult'));
        }

   
   public function edit(string $id)
        {
            $studentExamResult = StudentExamResult::with(['markDetails'])->findOrFail($id);
            $subjects = Subject::all();
            $studentexamtypes = StudentExamType::all();
            $students = Student::all();

            return view('pages.result.studentexamresult.edit', compact('studentExamResult', 'subjects', 'studentexamtypes', 'students'));
        }
    
  public function update(Request $request, string $id)
            {
                DB::beginTransaction();

                try {
                    $result = StudentExamResult::findOrFail($id);

                    $result->update([
                        'student_id' => $request->student_id,
                        'student_exam_type_id' => $request->student_exam_type_id,
                        'exam_year' => $request->exam_year,
                        'total_marks' => $request->total_marks,
                        'average_marks' => $request->average_marks,
                        'gpa' => $request->gpa,
                        'grade' => $request->grade,
                        'remark' => $request->remark,
                    ]);

               
                    StudentExamMarkDetail::where('student_exam_result_id', $id)->delete();

                    foreach ($request->subjects as $subject) {
                        StudentExamMarkDetail::create([
                            'student_exam_result_id' => $result->id,
                            'student_exam_type_id' => $request->student_exam_type_id,
                            'subject_id' => $subject['subject_id'],
                            'written_marks' => $subject['written_marks'] ?? null,
                            'mcq_marks' => $subject['mcq_marks'] ?? null,
                            'w_m_marks' => $subject['w_m_marks'] ?? (($subject['written_marks'] ?? 0) + ($subject['mcq_marks'] ?? 0)),
                            'gpa' => $subject['sgpa'] ?? 0,
                            'grade' => $subject['sgrade'] ?? null,
                            'remark' => $subject['remarks'] ?? null,
                        ]);
                    }

                    DB::commit();
                    return redirect('/studentexamresults');

                } catch (\Exception $e) {
                    DB::rollBack();
                    \Log::error("Exam result update failed: " . $e->getMessage());
                    return back()->withErrors(['error' => 'Update failed: ' . $e->getMessage()]);
                }
            }

    public function destroy(string $id)
    {
         $examresult = StudentExamResult::find($id);
            if ($examresult) {
            
            StudentExamMarkDetail::where('student_exam_result_id', $id)->delete();
            $examresult->delete();
         }
        return redirect('/studentexamresults');
    }
}
