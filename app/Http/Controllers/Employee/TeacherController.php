<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee\Teacher;
class TeacherController extends Controller
{
   
    public function index(Request $request)
    {
                $query = Teacher::with('employeeshift', 'employee_categorie');

            if ($request->filled('em_id')) {
                $query->where('id', $request->em_id);
            }

            if ($request->filled('em_name')) {
                $query->where('name', 'like', '%' . $request->em_name . '%');
            }

            $teachers = $query->paginate(10);

            return view('pages.employee.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $teachers=Teacher::find($id);
        return view('pages.employee.teacher.show',["teachers"=>$teachers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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
