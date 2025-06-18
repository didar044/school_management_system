<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance\EmployeeAttendance;
use App\Models\Employee\Employee;
use App\Models\Employee\Employeeshift;


class EmployeeAttendanceController extends Controller
{
  
   

    public function index(Request $request)
        {
            $search = $request->input('search');

            $query = EmployeeAttendance::with('employee', 'employeeshift')->orderByDesc('date');

            if (!empty($search)) {
                $query->where('employee_id', $search);
            }

            $employeeattendances = $query->paginate(10);

            return view('pages.attendance.employeeattendance.index', compact('employeeattendances', 'search'));
        }

   
    public function create( Request $request)
    {       


          $search = $request->input('search');
        
        // Search
          $employees=Employee::with('employeeshift')->where('name', 'like', "%{$search}%")->get();
     
       
         return view('pages.attendance.employeeattendance.create', compact('employees'));
    }

   
    public function store(Request $request)
        {
            foreach ($request->attendances as $employeeId => $attendanceData) {
                $attendance = new EmployeeAttendance();
                $attendance->employee_id = $attendanceData['employee_id'];
                $attendance->employeeshift_id = $attendanceData['employeeshift_id'];
                $attendance->check_in = $attendanceData['check_in'];
                $attendance->check_out = $attendanceData['check_out'];
                $attendance->status = $attendanceData['status'];
                $attendance->remarks = $attendanceData['remarks'];
                $attendance->date = $request->date;
                $attendance->save();
            }

            return redirect('/employeeattendances')->with('success', 'Attendance saved successfully!');
        }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {       
           
           $employeeattendances = EmployeeAttendance::with('employee','employeeshift')->find($id);

           return view('pages.attendance.employeeattendance.edit',["employeeattendances"=>$employeeattendances]);
    }

   
    public function update(Request $request, EmployeeAttendance $employeeattendance )
    {
        
                $employeeattendance ->employee_id = $request->employee_id;
                $employeeattendance ->date = $request->date;
                $employeeattendance ->check_in = $request->check_in;
                $employeeattendance ->check_out = $request->check_out;
                $employeeattendance ->status = $request->status;
                $employeeattendance ->remarks = $request->remarks;
                $employeeattendance ->save();
                return redirect('/employeeattendances');
    }

    
    public function destroy(string $id)
    {
        $employeeattendances = EmployeeAttendance::find($id);
        $employeeattendances ->delete();
        return redirect('/employeeattendances')->with('success');
    }
}
