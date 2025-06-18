<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam\StudentExamType;

class StudentExamTypeController extends Controller
{
    
    public function index()
    {
        $studentexamtypes=StudentExamType::all();
        return view('pages.exam.studentexamtype.index',compact('studentexamtypes'));
    }

   
    public function create()
    {
        return view('pages.exam.studentexamtype.create');
    }

    
    public function store(Request $request)
    {
        $studentexamtypes=new StudentExamType();
        $studentexamtypes->name=$request->name;
        $studentexamtypes->term=$request->term;
        $studentexamtypes->session_year=$request->session_year;
        $studentexamtypes->start_date=$request->start_date;
        $studentexamtypes->end_date=$request->end_date;
        $studentexamtypes->pass_marks=$request->pass_marks;
        $studentexamtypes->max_number=$request->max_number;
        $studentexamtypes->remark=$request->remark;
        $studentexamtypes->save();
        return redirect('/studentexamtypes');
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
        $studentexamtype=StudentExamType::find($id);
        return view('pages.exam.studentexamtype.edit',compact('studentexamtype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $studentexamtype=StudentExamType::findorFail($id);
        $studentexamtype->name=$request->name;
        $studentexamtype->term=$request->term;
        $studentexamtype->session_year=$request->session_year;
        $studentexamtype->start_date=$request->start_date;
        $studentexamtype->end_date=$request->end_date;
        $studentexamtype->pass_marks=$request->pass_marks;
        $studentexamtype->max_number=$request->max_number;
        $studentexamtype->remark=$request->remark;
        $studentexamtype->save();
        return redirect('/studentexamtypes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stuedentexam=StudentExamType::find($id);
        $stuedentexam->delete();
        return redirect('/studentexamtypes');
    }
}
