<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use App\Models\Student\Frequence;

class FrequenceController extends Controller
{
    
    public function index()
    {
        $frequences=DB::table("frequences")->get();
        //print_r ($frequences);
        return view('pages.school.frequence.index',["frequences"=>$frequences]);
    }

    
    public function create()
    {
        return view('pages.school.frequence.create');
    }

    
    public function store(Request $request)
    {
        $frequences=new Frequence();
        $frequences->typeName=$request->name;
        $frequences->frequency=$request->frequency;
        $frequences->description=$request->description;
        $frequences->save();
        return redirect('/frequences');
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
        $frequence=Frequence::find($id);
          return view('pages.school.frequence.edit',compact('frequence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $frequence= Frequence::findOrFail($id);
        $frequence->typeName=$request->name;
        $frequence->frequency=$request->frequency;
        $frequence->description=$request->description;
        $frequence->save();
        return redirect('/frequences');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $frequences=Frequence :: find($id);
       // $frequences->delete();
       return redirect('/frequences');
    }
}
