<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Batch\Shift;
use App\Models\Batch\Classe;
use App\Models\Batch\Section;
use App\Models\Student\Application;

class ApplicationController extends Controller
{
    
    public function index(Request $request)
    {
         // $applications=DB::table("applications")->get();
           //print_r($applications);
           //Count
     
         // $applicationsCount=Application::count();
         // echo"$applicationsCount"; 
    
         // $applicationgirlsCount=Application::where('gender','Female')->count();
         // echo"$applicationgirlsCount"; 

         //    $applicationboyesCount=Application::where('gender','Male')->count();

         //    $applicationothersCount=Application::where('gender','Other')->count();


        
         //    session(["applicationsCount"=>$applicationsCount,
         //             "applicationgirlsCount"=>$applicationgirlsCount,
         //             "applicationboyesCount"=>$applicationboyesCount,
         //             "applicationothersCount"=>$applicationothersCount
         //          ]);

         // data pass another table
         // $applications=Application::with('shift','section','classe')->get();
              //show data last to first
         // $applications = Application::latest()->get();
         //show last data ,pagination, another table data

      // $applications = Application::with('shift', 'section', 'classe')->latest()->paginate(10);
            $query = Application::with('shift', 'section', 'classe');

            if ($request->filled('ap_id')) {
                $query->where('id', $request->input('ap_id'));
            }

            if ($request->filled('ap_name')) {
                $query->where('name', 'like', '%' . $request->input('ap_name') . '%');
            }

            $applications = $query->latest()->paginate(10);

   

       return view('pages.school.application.index',["applications"=>$applications]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    
        $shifts=Shift::all();
        $classes=Classe::all();
        $sections=Section::all();
         return view('pages.school.application.create',["shifts"=>$shifts,"classes"=>$classes,"sections"=>$sections]);
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $applications=new Application();
        $applications->classe_id=$request->class_id;
        $applications->shift_id=$request->shift_id;
        $applications->section_id=$request->section_id;
        $applications->date=$request->date;
        $applications->session=$request->session;
        $applications->name=$request->name;
        $applications->father_name=$request->father_name;
        $applications->mother_name=$request->mother_name;
        $applications->dof=$request->dof;
        $applications->dob_reg=$request->dob_reg;
        $applications->blood_group=$request->blood_group;
        $applications->gender=$request->gender;
        $applications->religion=$request->religion;
       // $applications->photo=$request->photo;
        $applications->mobile_number=$request->mobile_number;
        $applications->email=$request->email;
        $applications->address=$request->address;
        $applications->save();
          
        if($request->hasFile('photo')){
            $imagename=$applications->id.'.'.$request->photo->extension();
            $request->photo->move(public_path('image/appplication_img'),$imagename);
            $applications->photo=$imagename;
            $applications->update();
            
        }
        
        
        return redirect('/applications');
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $applications=Application::find($id);
        return view('pages.school.application.show',["applications"=>$applications]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {     

        $applications=Application::find($id);
        $shifts=Shift::all();
        $classes=Classe::all();
        $sections=Section::all();
        return view('pages.school.application.edit',["applications"=>$applications,"shifts"=>$shifts,"classes"=>$classes,"sections"=>$sections]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        $application->classe_id=$request->class_id;
        $application->shift_id=$request->shift_id;
        $application->section_id=$request->section_id;
        $application->date=$request->date;
        $application->session=$request->session;
        $application->name=$request->name;
        $application->father_name=$request->father_name;
        $application->mother_name=$request->mother_name;
        $application->dof=$request->dof;
        $application->dob_reg=$request->dob_reg;
        $application->blood_group=$request->blood_group;
        $application->gender=$request->gender;
        $application->religion=$request->religion;
     // $application->photo=$request->photo;
        $application->mobile_number=$request->mobile_number;
        $application->email=$request->email;
        $application->address=$request->address;
        $application->save();
          
        if($request->hasFile('photo')){
            $imagename=$application->id.'.'.$request->photo->extension();
            $request->photo->move(public_path('image/appplication_img'),$imagename);
            $application->photo=$imagename;
            $application->update();
            
        }
        
        
        return redirect('/applications');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $applications=Application::find($id);
        $applications->delete();
        return redirect('/applications');
    }
}
