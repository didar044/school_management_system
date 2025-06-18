<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment\EmployeeFestivalBonuse;
use App\Models\Payment\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use App\Models\Employee\Employee;
use App\Models\Payment\EmployeeSalarie;
use App\Models\Employee\EmployeeAdministrator;
use App\Models\Payment\EmployeeSalaryPayment;
use App\Models\Payment\EmployeeSalaryPaymentDetail;
use App\Models\Providentfund\EmployeeProvidentFund;


class EmployeeSalariePaymentController extends Controller
{
    
    public function index()
    {     
       
         $employeesalarypayments=EmployeeSalaryPayment::with('employeeadministrator','employeefestivalbonuse','paymentmethod')->get();
         return view('pages.payment.employeesalarypayment.index',["employeesalarypayments"=>$employeesalarypayments]);
    }

   
     public function create(Request $request)
    {       
          // $employeesalarie=EmployeeSalarie::all();
           $search = $request->input('search'); 
            $employeefestivalbonuses=EmployeeFestivalBonuse::all();
            $paymentmethods=PaymentMethod::all();
            $employeesdministrators=EmployeeAdministrator::all();
           $employee= $search ? Employee::where('id', '=', $search)->first() : null;
           return view('pages.payment.employeesalarypayment.create',["employee"=>$employee,"employeefestivalbonuses"=>$employeefestivalbonuses,"paymentmethods"=>$paymentmethods,"employeesdministrators"=>$employeesdministrators]);
    }

    public function store(Request $request)
    {
           DB::beginTransaction();
           try {
                    
                $employeesalarypayment=EmployeeSalaryPayment::create([

                    'employee_id'=>$request->employee_id,
                    'name'=>$request->name,
                    'payment_date'=>$request->payment_date,
                    'employee_administrator_id'=>$request->salary_issuer,
                    'employee_festival_bonuse_id'=>$request->salary_month,
                    'payment_method_id'=>$request->payment_method,
                    'reference'=>$request->reference,
                    'total_amount'=>$request->total_amount,
                    'total_deductions'=>$request->totaldeduction,
                    'net_salary'=>$request->net_salary,
                    'paid_amount'=>$request->paid,
                ]);
                $employeesalarypayment->save();
                 

                $employeesalaryPaymentdetail=EmployeeSalaryPaymentDetail::create([
                       'employee_salary_payment_id'=>$employeesalarypayment->id,
                        'basic_salary'=>$request->basic_salary,
                        'house_allowance'=>$request->house_allowance,
                        'transport_allowance'=>$request->transport_allowance,
                        'medical_allowance'=>$request->medical_allowance,
                        'education_allowance'=>$request->education_allowance,
                        'food_allowance'=>$request->food_allowance,
                        'child_care_allowance'=>$request->child_care_allowance,
                        'bonus'=>$request->bonus,
                        'provident_fund'=>$request->provident_fund,
                        'absence'=>$request->absence,
                        'fine'=>$request->fine,
                        'tax'=>$request->tax,
                ]);


                $employeeprovidentfund=EmployeeProvidentFund::create([
                    'employee_salary_payment_id'=>$employeesalarypayment->id,  
                    'employee_id'=>$request->employee_id,
                      'name'=>$request->name,
                      'employee_festival_bonuse_id'=>$request->salary_month,
                      'payment_date'=>$request->payment_date,
                      'provident_fund'=>$request->provident_fund,
                      


                ]);
                

               DB::commit();
               return redirect('employeesalarypayments');
               
           } catch (\Exception $e) {
                 DB::rollBack();
                \Log::error("Payment creation failed: " . $e->getMessage());
                return back()->withErrors(['error' => 'Payment failed: ' . $e->getMessage()]);
           }
    }

   
   public function show(string $id)
        {
            $employeesalarypayment = EmployeeSalaryPayment::findOrFail($id);
            $employee = $employeesalarypayment->employee;
            $employeesalarypaymentdetail = EmployeeSalaryPaymentDetail::where('employee_salary_payment_id', $employeesalarypayment->id)->first();



            return view('pages.payment.employeesalarypayment.show', compact('employeesalarypayment', 'employee','employeesalarypaymentdetail'));
        }

    
    public function edit(string $id)
    {
        
    }

    
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
