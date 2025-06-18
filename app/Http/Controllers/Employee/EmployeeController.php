<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee\Employeeshift;
use App\Models\Employee\Employee_categorie;
use App\Models\Employee\Employee;
use App\Models\Employee\Teacher;


class EmployeeController extends Controller
{
    
    public function index(Request $request)
    {
       //   $employees=DB::table("employees")->get();
          //print_r($employees);
         
      // $employeescount=Employee::count();
      // $teachercount = Employee::whereIn('employee_categorie_id', ['1', '2', '3'])->count();
      // $soupportstafcount = Employee::whereIn('employee_categorie_id', [5, 4])->count();
      // $maintenancestaffcount = Employee::where('employee_categorie_id', '6')->count(); 
        //    session([
        //          "employeescount"=>Employee::count(),
        //          "teachercount"=>Employee::whereIn('employee_categorie_id', ['1', '2', '3'])->count(),
        //          "soupportstafcount"=>Employee::whereIn('employee_categorie_id', [5, 4])->count(),
        //          "maintenancestaffcount" => Employee::where('employee_categorie_id', '6')->count()
        //      ]);
    


        
            $query = Employee::with('employeeshift', 'employee_categorie');

            if ($request->filled('em_id')) {
                $query->where('id', $request->em_id);
            }

            if ($request->filled('em_name')) {
                $query->where('name', 'like', '%' . $request->em_name . '%');
            }

            $employees = $query->paginate(10);

            return view('pages.employee.employee.index', compact('employees'));
    }

   
    public function create()
    {    
        $employeeshifts=Employeeshift::all();
        $categories=Employee_categorie::all();

        // $count=Employee::count();
        // $em_id = "8205" . $count+1;
        $lastId = Employee::max('id'); // get highest existing ID
        $em_id = $lastId ? $lastId + 1 : 82051;

        return view('pages.employee.employee.create',["employeeshifts"=>$employeeshifts,"categories"=>$categories,"em_id"=>$em_id]);
    }

    
   public function store(Request $request)
{     
    $employees = new Employee();
    $employees->id = $request->id;  
    $employees->employeeshift_id = $request->employeeshift_id;
    $employees->employee_categorie_id = $request->employee_categorie_id;
    $employees->joining_date = $request->joining_date;
    $employees->name = $request->name;
    $employees->father_name = $request->father_name;
    $employees->mother_name = $request->mother_name;
    $employees->nid = $request->nid;
    $employees->gender = $request->gender;
    $employees->dob = $request->dob;
    $employees->qualification = $request->qualification;
    $employees->phone_number = $request->phone_number;
    $employees->email = $request->email;
    $employees->address = $request->address;

    $imageName = null;
    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        $image = $request->file('photo');
        $imageName = $employees->id . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('image/employee_img'), $imageName);
        $employees->photo = $imageName;
    }

    $employees->save();

    if (in_array((int)$request->employee_categorie_id, [1, 2, 3])) {
        $teachers = new Teacher();
        $teachers->id = $request->id;
        $teachers->employeeshift_id = $request->employeeshift_id;
        $teachers->employee_categorie_id =$request->employee_categorie_id;
        $teachers->joining_date = $request->joining_date;
        $teachers->name = $request->name;
        $teachers->father_name = $request->father_name;
        $teachers->mother_name = $request->mother_name;
        $teachers->nid = $request->nid;
        $teachers->gender = $request->gender;
        $teachers->dob = $request->dob;
        $teachers->qualification = $request->qualification;
        $teachers->phone_number = $request->phone_number;
        $teachers->email = $request->email;
        $teachers->address = $request->address;
        $teachers->photo = $imageName;
        $teachers->save();
    }

    return redirect('/employees');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {     
        $employees=Employee::find($id);
        return view('pages.employee.employee.show',["employees"=>$employees]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employees=Employee::find($id);
        $employeeshifts=Employeeshift::all();
        $categories=Employee_categorie::all();
        return view('pages.employee.employee.edit',["employees"=>$employees,"employeeshifts"=>$employeeshifts,"categories"=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee,Teacher $teacher)
    {
        $employee->employeeshift_id = $request->employeeshift_id;
        $employee->employee_categorie_id = $request->employee_categorie_id;
        $employee->joining_date = $request->joining_date;
        $employee->name = $request->name;
        $employee->father_name = $request->father_name;
        $employee->mother_name = $request->mother_name;
        $employee->nid = $request->nid;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->qualification = $request->qualification;
        $employee->phone_number = $request->phone_number;
        $employee->email = $request->email;
        $employee->address = $request->address;

        $imageName = null;
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $image = $request->file('photo');
            $imageName = $employee->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image/employee_img'), $imageName);
            $employee->photo = $imageName;
        }

        $employee->update();

    //          if (in_array((int)$request->employee_categorie_id, [1, 2, 3])) {
    //             $teacher = $employee->teacher; // retrieve related teacher

    //         if ($teacher) {
    //             $teacher->employeeshift_id = $request->employeeshift_id;
    //             $teacher->employee_categorie_id = $request->employee_categorie_id;
    //             $teacher->joining_date = $request->joining_date;
    //             $teacher->name = $request->name;
    //             $teacher->father_name = $request->father_name;
    //             $teacher->mother_name = $request->mother_name;
    //             $teacher->nid = $request->nid;
    //             $teacher->gender = $request->gender;
    //             $teacher->dob = $request->dob;
    //             $teacher->qualification = $request->qualification;
    //             $teacher->phone_number = $request->phone_number;
    //             $teacher->email = $request->email;
    //             $teacher->address = $request->address;
    //             if (isset($imageName)) {
    //                 $teacher->photo = $imageName;
    //             }
             
    //             $teacher->save(); // save teacher
    //         }
    //    }
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            $employee->delete();
        }
    
        $teacher = Teacher::find($id);
        if ($teacher) {
            $teacher->delete();
        }
        return redirect('/employees');
    }
}
