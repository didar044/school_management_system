<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment\EmployeeDeduction;
use App\Models\Employee\Employee_categorie;

class EmployeeDeductionController extends Controller
{
    
    public function index()
    {
         $employeedeductions=EmployeeDeduction::with('employee_categorie')->get();
        return view('pages.payment.employeededuction.index',["employeedeductions"=>$employeedeductions]);
    }

    
    public function create()
    {
         $employee_categories=Employee_categorie::all();
           
         return view('pages.payment.employeededuction.create',["employee_categories"=>$employee_categories]);
    }

    
    public function store(Request $request)
    {
        $employeedeductions=new EmployeeDeduction();
        $employeedeductions->employee_categorie_id=$request->employee_categorie_id;
        $employeedeductions->basic_salary=$request->basic_salary;
        $employeedeductions->tax=$request->tax;
        $employeedeductions->absence=$request->absence;
        $employeedeductions->fine=$request->fine;
        $employeedeductions->provident_fund=$request->provident_fund;
        $employeedeductions->save();
        return redirect('/employeedeductions');
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
         $employeededuction=EmployeeDeduction::find($id);
         $employee_categories=Employee_categorie::all();
         return view('pages.payment.employeededuction.edit',["employeededuction"=>$employeededuction,"employee_categories"=>$employee_categories]);
    }

   
    public function update(Request $request, string $id)
    {
        $employeededuction=EmployeeDeduction::findorFail($id);
        $employeededuction->employee_categorie_id=$request->employee_categorie_id;
        $employeededuction->basic_salary=$request->basic_salary;
        $employeededuction->tax=$request->tax;
        $employeededuction->absence=$request->absence;
        $employeededuction->fine=$request->fine;
        $employeededuction->provident_fund=$request->provident_fund;
        $employeededuction->save();
        return redirect('/employeedeductions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employeededuction=EmployeeDeduction::find($id);
        $employeededuction->delete();
         return redirect('/employeedeductions');
    }
}
