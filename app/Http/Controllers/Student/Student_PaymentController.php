<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student\Application;
use App\Models\Student\Student;
use App\Models\Student\Frequence;
use App\Models\Student\Expense;
use App\Models\Student\Student_Payment_Detail;
use App\Models\Student\Student_Payment;
use App\Models\Employee\EmployeeAdministrator;
use App\Models\Payment\PaymentMethod;

class Student_PaymentController extends Controller
{    

        public function index(Request $request)
        {
            $query = Student_Payment::query();

            if ($request->filled('st_id')) {
                $query->where('student_id', $request->input('st_id'));
            }

            if ($request->filled('st_name')) {
                $query->where('name', 'like', '%' . $request->input('st_name') . '%');
            }

            $studentpayments = $query->with(['paymentmethod', 'shift', 'classe', 'emplyeeadministrator'])
                                    ->latest()
                                    ->paginate(10)
                                    ->withQueryString();

            return view('pages.school.studentpayment.index', [
                'studentpayments' => $studentpayments
            ]);
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {       
            //Search For Data
          $search = $request->input('search'); 
           


           $classe1Roll = Student::where('classe_id', 1)->count() + 1;
           $classe2Roll = Student::where('classe_id', 2)->count() + 1;
           $classe3Roll = Student::where('classe_id', 3)->count() + 1;
           $classe4Roll = Student::where('classe_id', 4)->count() + 1;
           $classe5Roll = Student::where('classe_id', 5)->count() + 1;
            session([
            "classe1Roll"=>$classe1Roll,
            "classe2Roll"=>$classe2Roll,
            "classe3Roll"=>$classe3Roll,
            "classe4Roll"=>$classe4Roll,
            "classe5Roll"=>$classe5Roll,
            
         ]);

    
        //   $applicatons = Application::when($search, function ($query, $search) {
        //        return $query->where('id', '=', $search);
        //      })->get();
         $application=Application::with('shift','classe')->get(); //Joing

         $frequences=Frequence::all();  //joing
         $expenses=Expense::all()->keyBy('classe_id'); //joing

        
        //  print_r($expenses);
        // echo"$classe1Roll";
        $application = $search ? Application::where('id', '=', $search)->first() : null;
        // return view('pages.school.studentpayment.create',["applications"=>$applicatons]);

        $employeeadministrators=EmployeeAdministrator::all();
        $paymentmethods=PaymentMethod::all();
        return view('pages.school.studentpayment.create', compact('application', 'search','expenses','frequences','employeeadministrators','paymentmethods'));
    }

    
    public function store(Request $request)
    {
           DB::beginTransaction();
           try{   
                    // 1. Store main invoice
                $payment = Student_Payment::create([
                                'student_id' => $request->id,
                                'name' => $request->name,
                                'reiceve_by'=>$request->reiceve_by,
                                'payment_method' => $request->payment_method,
                                'reference_number' => $request->reference_number,
                                'payment_date' => $request->date,
                                'total_amount' => $request->total_amount,
                                'paid_amount' => $request->paid_amount,
                                'due_amount' => $request->due_amount,                    
                            ]);

                  $payment->due_amount = $payment->total_amount - $payment->paid_amount;
                  $payment->save();
                  

                  // 3. Store line items
                  foreach($request->expense_type as $index =>$type){
                       Student_Payment_Detail::create([
                               'student_payment_id' => $payment->id,
                               'expense_type' => $type,
                               'fee' => $request->fee[$index],
                               'month' => $request->month[$index],
                               'waived' => $request->waived[$index], 
                               'total' => ($request->fee[$index] * $request->month[$index]) - $request->waived[$index],
                               'remark' => $request->remark[$index],  
                       ]);
                    

                  }

                  // Move application data to students table
                     
                     $application = Application::findorFail($request->id);
                     Student::create([
                            'id'=>$application->id,
                            'shift_id'=>$application->shift_id,
                            'section_id'=>$application->section_id,
                            'classe_id'=>$application->classe_id,
                            'roll_number'=> $request->roll,
                            'admission_date'=>$request->date,
                            'session'=>$application->session,

                            'name'=>$application->name,
                            'father_name'=>$application->father_name,
                            'mother_name'=>$application->mother_name,
                            'dof'=>$application->dof,
                            'dob_reg'=>$application->dob_reg,
                            'blood_group'=>$application->blood_group,
                            'gender'=>$application->gender,
                            'religion'=>$application->religion,
                            'photo'=>$application->photo,

                            'mobile_number'=>$application->mobile_number,
                            'email'=>$application->email,
                            'address'=>$application->address,

                     ]);

                     $application->delete();
                   
                 
                     DB::commit();
                     return redirect('studentpayments');

           }   catch (\Exception $e) {
               DB::rollBack();
               return back()->withErrors(['error' => 'Payment failed: ' . $e->getMessage()]);
           }
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        
        // $student=Student::find($id);
        //print_r($students);

        
        $studentpayment=Student_Payment::find($id);
        $student = Student::findOrFail($studentpayment->student_id);
        $student_payment_details = Student_Payment_Detail::where('student_payment_id', $studentpayment->id)->get();

      return view('pages.school.studentpayment.show',["studentpayment"=>$studentpayment,"student"=>$student,"student_payment_details"=>$student_payment_details]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
