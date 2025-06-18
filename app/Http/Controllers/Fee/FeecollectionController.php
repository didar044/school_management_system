<?php

namespace App\Http\Controllers\Fee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student\Student;
use App\Models\Student\Frequence;
use App\Models\Student\Expense;
use App\Models\Student\Student_Payment_Detail;
use App\Models\Student\Student_Payment;
use App\Models\Employee\EmployeeAdministrator;
use App\Models\Payment\PaymentMethod;
use App\Models\Fee\Feecollection;
class FeecollectionController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Feecollection::query();  // Queries student_payments table

        if ($request->filled('st_id')) {
            $query->where('student_id', $request->input('st_id'));
        }

        if ($request->filled('st_name')) {
            $query->where('name', 'like', '%' . $request->input('st_name') . '%');
        }

        $studentpayments = $query->with(['paymentmethod', 'shift', 'classe', 'payment'])
                                ->latest()
                                ->paginate(10)
                                ->withQueryString();

        return view('pages.fee.feecollection.index', [
            'studentpayments' => $studentpayments
        ]);
    }
        public function create(Request $request)
        {
            $search = $request->input('search'); 
            $students = Student::with('shift', 'class')->get();
            $frequences = Frequence::all();  
            $expenses = Expense::all()->keyBy('classe_id'); 

           // $expenses = Expense::where('classe_id', $student->classe_id ?? 0)->get()->groupBy('classe_id');
            $student = $search ? Student::with(['shift', 'class'])->where('id', $search)->first() : null;
            $employeeadministrators = EmployeeAdministrator::all();
            $paymentmethods = PaymentMethod::all();

            $paymentHistory = null;

            if ($student) {
              $paymentHistory = Student_Payment::with('details')
                ->where('student_id', $student->id)
                ->orderBy('created_at', 'desc')
                ->get();
            }

            return view('pages.fee.feecollection.create', compact(
                'students',
                'student',
                'expenses',
                'frequences',
                'employeeadministrators',
                'paymentmethods',
                'paymentHistory'
            ));
        }

       public function store(Request $request)
    {
           DB::beginTransaction();
           try{   
                   
                $payment = Student_Payment::create([
                        'student_id' => $request->id,
                        'name' => $request->name,
                        'reiceve_by' => $request->reiceve_by,
                        'payment_method' => $request->payment_method,
                        'reference_number' => $request->reference_number,
                        'payment_date' => $request->date,
                        'total_amount' => $request->total_amount,
                        'paid_amount' => $request->paid_amount,
                        'due_amount' => $request->total_amount - $request->paid_amount,
                    ]);

                            

                  $payment->due_amount = $payment->total_amount - $payment->paid_amount;
                  $payment->save();
                  

               
                
                    foreach ($request->expense_type as $index => $type) {
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
                    

                  
                               
                     DB::commit();
                     return redirect('feecollections');

           }   catch (\Exception $e) {
               DB::rollBack();
               return back()->withErrors(['error' => 'Payment failed: ' . $e->getMessage()]);
           }
      
    }

    
       public function show(string $id)
    { 
        
        

        
        $studentpayment=Student_Payment::find($id);
        $student = Student::findOrFail($studentpayment->student_id);
        $student_payment_details = Student_Payment_Detail::where('student_payment_id', $studentpayment->id)->get();

      return view('pages.fee.feecollection.show',["studentpayment"=>$studentpayment,"student"=>$student,"student_payment_details"=>$student_payment_details]);
    }


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
