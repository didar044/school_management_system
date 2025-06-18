<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee\EmployeeAdministrator;
use App\Models\Employee\Employee;

class EmployeeAdministratorController extends Controller
{
   
    public function index()
    {
        $employeeadministrators=EmployeeAdministrator::all();
        return view('pages.employee.employeeadministrator.index',["employeeadministrators"=>$employeeadministrators]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    
        $employees=Employee::with('employee_categorie')->get();
        return view('pages.employee.employeeadministrator.create',["employees"=>$employees]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employeeadministrators=new EmployeeAdministrator();
        $employeeadministrators->name=$request->name;
        $employeeadministrators->employee_id=$request->employee_id;
        $employeeadministrators->employee_categorie=$request->categorie;
        $employeeadministrators->role=$request->role;
        $employeeadministrators->save();
        return redirect('/employeeadministrators');
    }

  
    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
         $employeeadministrators=EmployeeAdministrator::find($id);
         $employees=Employee::with('employee_categorie')->get();
         return view('pages.employee.employeeadministrator.edit',["employeeadministrators"=>$employeeadministrators,"employees"=>$employees]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employeeadministrator=EmployeeAdministrator::findorFail($id);
        $employeeadministrator->name=$request->name;
        $employeeadministrator->employee_id=$request->employee_id;
        $employeeadministrator->employee_categorie=$request->categorie;
        $employeeadministrator->role=$request->role;
        $employeeadministrator->save();
        return redirect('/employeeadministrators');

    }

   
    public function destroy(string $id)
    {
        $employeeadministrator=EmployeeAdministrator::find($id);
        $employeeadministrator->delete();
        return redirect('/employeeadministrators');
    }
}
