<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee\Employee_categorie;
use App\Models\Payment\EmployeeDeduction;
Use App\Models\Payment\EmployeeSalarie;

class Employee_categorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          

        $categories=DB::table("employee_categories")->get();
       // print_r($categories);
       return view('pages.employee.categorie.index',["categories"=>$categories]);
    }

    
    
    public function create()
    {
        return view('pages.employee.categorie.create');
    }

   
    public function store(Request $request)
    {  
        $categories=new  Employee_categorie();
        $categories->name=$request->name;
        $categories->description=$request->description;
        $categories->salary=$request->salary;
        $categories->save();
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Employee_categorie::find($id);
        return view('pages.employee.categorie.edit',["categories"=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {       
        $categories=Employee_categorie::findOrFail($id);
        $categories->name=$request->input('name');
        $categories->description=$request->input('description');
        $categories->salary=$request->input('salary');
        $categories->save();

       
        EmployeeDeduction::where('employee_categorie_id', $id)
            ->update(['basic_salary' => $request->input('salary')]);

       
        EmployeeSalarie::where('employee_categorie_id', $id)
            ->update(['basic_salary' => $request->input('salary')]);
        return redirect('/categories');
    }

    
    public function destroy(string $id)
    {
        $categories=Employee_categorie::find($id);
        $categories->delete();
        return redirect('/categories');
    }
}
