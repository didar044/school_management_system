<?php

namespace App\Http\Controllers\Batch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Batch\Section;
use App\Models\Batch\Shift;

class SectionController extends Controller
{
    
    public function index()
    {
        // $sections=DB::table("sections")->get();

        //print_r($sections);
        $shifts=Shift::all();

        // its for relation table
        $sections=Section::with('shift')->latest()->get();

       // return view('pages.batch.section.index',["sections"=>$sections]);

       return view('pages.batch.section.index', compact("sections" ));
        
    }

    
    public function create()
    {    
        $shifts=Shift::all();
        // print_r($classes);
        return view('pages.batch.section.create',["shifts"=>$shifts]);
    }

   
    public function store(Request $request)
    {   

        $sections=new Section();
        $sections->name=$request->name;
        $sections->shift_id=$request->shift_id;
        $sections->save();
        return redirect('/sections');
        
    }

   
    public function show(string $id)
    {
        $sections=Section::find($id);
        return view ('pages.batch.section.show',["sections"=>$sections]);
    }

    
    public function edit(string $id)
    {
        $sections=Section::find($id);
        $shifts=Shift::all();
        return view ('pages.batch.section.edit',["sections"=>$sections ,"shifts"=>$shifts]);
    }

    
    public function update(Request $request, Section $section)
    {    
        $section->name=$request->name;
        $section->shift_id=$request->shift_id;
        $section->save();
        return redirect('/sections');
    }

    
    public function destroy(string $id)
    {
        $sections=Section::find($id);
        $sections->delete();
        return redirect('/sections');
    }
}
