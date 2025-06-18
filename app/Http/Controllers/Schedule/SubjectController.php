<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects=DB::table('subjects')->get();
        return view('pages.schedule.subject.index',["subjects"=>$subjects]);

    }

    
    public function create()
    {
        return view('pages.schedule.subject.create');
    }

    
    public function store(Request $request)
    {
         $subjects=new Subject();
         $subjects->id=$request->id;
         $subjects->name=$request->name;
         $subjects->description=$request->description;
         $subjects->save();
         return redirect('/subjects');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {    
        $subjects=Subject::find($id);
        return view('pages.schedule.subject.edit',["subjects"=>$subjects]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        
         $subject->name=$request->name;
         $subject->description=$request->description;
         $subject->save();
         return redirect('/subjects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subjects=Subject::find($id);
        $subjects->delete();
        return redirect('/subjects');
    }
}
