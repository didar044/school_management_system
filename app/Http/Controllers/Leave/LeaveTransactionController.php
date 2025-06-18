<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave\LeaveApplication;
use App\Models\Leave\LeaveTransaction;

class LeaveTransactionController extends Controller
{
    
    
    public function index()
    {
        
        $leavetransactions=LeaveTransaction::with('leavecategorie','student','employee')->latest()->get();
         return view('pages.leave.leavetransactions.index',['leavetransactions'=>$leavetransactions]);
    }

    public function create()
    {
    
    }

    public function store(Request $request )
    {
    
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        $leaveApplication = LeaveApplication::findOrFail($id);
        $leaveApplication->status = $request->input('status');
        $leaveApplication->save();
    
        LeaveTransaction::create([
            'leave_application_id' => $leaveApplication->id,
            'person_id'            => $leaveApplication->person_id,
            'leave_categorie_id'   => $leaveApplication->leave_categorie_id,
            'date'                 => $leaveApplication->date,
            'from_date'            => $leaveApplication->from_date,
            'to_date'              => $leaveApplication->to_date,
            'days'                 => $leaveApplication->days,
            'remark'               => $leaveApplication->remark,
        ]);
    
        return redirect('/leaveapplications');
    }

    
    public function destroy(string $id)
    {
        $leavetransactions=LeaveTransaction::find($id);
        $leavetransactions->delete();
        return redirect('/leavetransactions');
    }
}
