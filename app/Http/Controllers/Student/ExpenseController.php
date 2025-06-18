<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Batch\Classe;
use App\Models\Student\Expense;
use App\Models\Student\Frequence;


class ExpenseController extends Controller
{
   
    public function index()
    {
       // $expenses=DB::table("expenses")->get();
       // print_r("$expenses");
       $expenses=Expense::with('classe')->get();
       return view('pages.school.expense.index',["expenses"=>$expenses]);

    }

   
    public function create()
    {
          $classes=Classe::all();

        return view('pages.school.expense.create',["classes"=>$classes]);
    }

    
    public function store(Request $request)
    {
        $expenses=new Expense();
        $expenses->classe_id=$request->class_id;
        $expenses->admission_fee=$request->admission_fee;
        $expenses->monthly_fee=$request->monthly_fee;
        $expenses->uniform_fee=$request->uniform_fee;
        $expenses->books_fee=$request->books_fee;
        $expenses->exam_fee=$request->exam_fee;
        $expenses->library_fee=$request->library_fee;
        $expenses->lab_fee=$request->lab_fee;
        $expenses->id_card_fee=$request->id_card_fee;
        $expenses->development_fee=$request->development_fee;
        $expenses->sports_fee=$request->sports_fee;
        $expenses->art_craft_fee=$request->art_craft_fee;
        $expenses->report_card_fee=$request->report_card_fee;
        $expenses->save();
        return redirect('/expenses');
        
    }

    
    public function show(string $id)
    {
       // $expenses=Expense::find($id)->with('class')->get(); it's wrong

        $expenses = Expense::with('classe')->find($id);
        $frequences=Frequence::all();
        return view('pages.school.expense.show',["expenses"=>$expenses,"frequences"=>$frequences]);
    }

   
    public function edit(string $id)
    {      
        $classes=Classe::all();
        $expenses=Expense::find($id);
        return view('pages.school.expense.edit',["expenses"=>$expenses,"classes"=>$classes]);
    }

    
    public function update(Request $request, Expense $expense)
    {
        $expense->classe_id=$request->class_id;
        $expense->admission_fee=$request->admission_fee;
        $expense->monthly_fee=$request->monthly_fee;
        $expense->uniform_fee=$request->uniform_fee;
        $expense->books_fee=$request->books_fee;
        $expense->exam_fee=$request->exam_fee;
        $expense->library_fee=$request->library_fee;
        $expense->lab_fee=$request->lab_fee;
        $expense->id_card_fee=$request->id_card_fee;
        $expense->development_fee=$request->development_fee;
        $expense->sports_fee=$request->sports_fee;
        $expense->art_craft_fee=$request->art_craft_fee;
        $expense->report_card_fee=$request->report_card_fee;
        $expense->save();
        return redirect('/expenses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expenses=Expense::find($id);
        $expenses->delete;
        return redirect('/expenses');
    }
}
