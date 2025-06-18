<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee\EmployeeShift;

class EmployeeshiftController extends Controller
{
    
    public function index()
    {
        $employeeshifts=DB::table("employeeshifts")->get();
       // print_r($employeeshifts);
        return view('pages.employee.employeeshift.index',["employeeshifts"=>$employeeshifts]);
    }

    
    public function create()
    {
        return view("pages.employee.employeeshift.create");
    }

   
    public function store(Request $request)
    {
        $employeeshifts=new Employeeshift();
        $employeeshifts->name=$request->name;
        $employeeshifts->save();
        return redirect('/employeeshifts');
    }

   
    public function show(string $id)
    {
        $employeeshifts=Employeeshift::find($id);
        return view("pages.employee.employeeshift.show",["employeeshifts"=>$employeeshifts]);
    }

   
    public function edit(string $id)
    {
        $employeeshifts=Employeeshift::find($id);
        return view ("pages.employee.employeeshift.edit",["employeeshifts"=>$employeeshifts]);

    }

    
    public function update(Request $request, $id)
    {
        $employeeshifts=Employeeshift::find($id);
        $employeeshifts->name = $request->input('name');
        $employeeshifts->update();
        return redirect('/employeeshifts');
    }

    
    public function destroy(string $id)
    {    
        
        $employeeshifts=Employeeshift::find($id);
        $employeeshifts->delete();
        return redirect('/employeeshifts');
    }
}
