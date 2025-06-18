<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Leave\LeaveCategorie;
use App\Models\Leave\LeaveApplication;
use App\Models\Employee\Employee;
use App\Models\Student\Student;

class LeaveApplicationController extends Controller
{
    
    public function index()
    {
       // $leaveapplications=DB::table('leave_applications')->latest()->get();
       $leaveapplications=LeaveApplication::with('leavecategorie','student','employee')->latest()->get();
      // print_r("$leaveapplications->leavecategorie->name");
        return view('pages.leave.leaveapplication.index',['leaveapplications'=>$leaveapplications]);
    }

   
    public function create()
    {    
        $leavecategories=LeaveCategorie::all();
        $employees=Employee::all();
        $students=Student::all();
        return view('pages.leave.leaveapplication.create',['leavecategories'=>$leavecategories,'employees'=>$employees,'students'=>$students]);
    }

    
    public function store(Request $request)
    {
        $leaveapplications=new LeaveApplication();
        $leaveapplications->person_type=$request->person_type;
        $leaveapplications->person_id=$request->person_id;
        $leaveapplications->leave_categorie_id=$request->leave_categorie_id;
        $leaveapplications->from_date=$request->from_date;
        $leaveapplications->to_date=$request->to_date;
        $leaveapplications->remark=$request->remark;
        $leaveapplications->date=$request->date;
        $leaveapplications->days=$request->days;
        $leaveapplications->save();
           return redirect('/leaveapplications');
    }

    
    public function show(string $id)
    {
        
    }

   
    public function edit(string $id)
    {
        
    }

   
    public function update(Request $request, string $id)
    {
        $leaveApplication = LeaveApplication::findOrFail($id);
        $leaveApplication->status = $request->input('status'); 
        $leaveApplication->save();
        return redirect('/leaveapplications');
    }

    
    public function destroy(string $id)
    {
        $leaveapplications = LeaveApplication::find($id);
        $leaveapplications->delete();
        return redirect('/leaveapplications');

    }
}
