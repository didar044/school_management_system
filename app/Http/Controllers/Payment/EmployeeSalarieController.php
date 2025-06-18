<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment\EmployeeSalarie;
use Illuminate\Support\Facades\DB;
use App\Models\Employee\Employee_categorie;

class EmployeeSalarieController extends Controller
{
    public function index()
    {    
        
        $employeesalaries=EmployeeSalarie::with('employee_categorie')->get();
        return view('pages.payment.employeesalare.index',["employeesalaries"=>$employeesalaries]);
    }

    
    public function create()
    {     
         $employee_categories=Employee_categorie::all();
           
         return view('pages.payment.employeesalare.create',["employee_categories"=>$employee_categories]);
    }

    public function getCategorySalary($id)
        {
            $category = Employee_categorie::find($id);
            return response()->json(['salary' => $category->salary?? 0]);
        }

   
    public function store(Request $request)
    {      
        $employeesalaries=new EmployeeSalarie();
        $employeesalaries->employee_categorie_id=$request->employee_categorie_id;
        $employeesalaries->basic_salary=$request->basic_salary;
        $employeesalaries->house_allowance=$request->house_allowance;
        $employeesalaries->transport_allowance=$request->transport_allowance;
        $employeesalaries->medical_allowance=$request->medical_allowance;
        $employeesalaries->education_allowance=$request->education_allowance;
        $employeesalaries->food_allowance=$request->food_allowance;
        $employeesalaries->child_care_allowance=$request->child_care_allowance;
       
        $employeesalaries->save();
        return redirect('/employeesalaries');
        
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
        $employeesalarie=EmployeeSalarie::find($id);
        $employee_categories=Employee_categorie::all();
         return view('pages.payment.employeesalare.edit',["employeesalarie"=>$employeesalarie,"employee_categories"=>$employee_categories]);

    }

   
    public function update(Request $request, $id )
    {    
        $employeesalarie = EmployeeSalarie::findOrFail($id);
        $employeesalarie->employee_categorie_id=$request->employee_categorie_id;
        $employeesalarie->basic_salary=$request->basic_salary;
        $employeesalarie->house_allowance=$request->house_allowance;
        $employeesalarie->transport_allowance=$request->transport_allowance;
        $employeesalarie->medical_allowance=$request->medical_allowance;
        $employeesalarie->education_allowance=$request->education_allowance;
        $employeesalarie->food_allowance=$request->food_allowance;
        $employeesalarie->child_care_allowance=$request->child_care_allowance;
        
        $employeesalarie->save();
         return redirect('/employeesalaries');

    }

   
    public function destroy(string $id)
    {
        $employeesalarie=EmployeeSalarie::find($id);
        $employeesalarie->delete();
        return redirect('/employeesalaries');
    }
}
