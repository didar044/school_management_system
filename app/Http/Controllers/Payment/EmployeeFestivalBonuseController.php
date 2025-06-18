<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment\EmployeeFestivalBonuse;

class EmployeeFestivalBonuseController extends Controller
{
    
    public function index()
    {     
        $employeefestivalbonuses=EmployeeFestivalBonuse::all();
        return view('pages.payment.employeefestivalbonuse.index',["employeefestivalbonuses"=>$employeefestivalbonuses]);
    }

   
    public function create()
    {
         return view('pages.payment.employeefestivalbonuse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employeefestivalbonuses=new EmployeeFestivalBonuse();
        $employeefestivalbonuses->month=$request->month;
        $employeefestivalbonuses->festival_name=$request->festival_name;
        $employeefestivalbonuses->bonus_amount=$request->bonus_amount;
        $employeefestivalbonuses->save();
        return redirect('/employeefestivalbonuses');
    }

    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $employeefestivalbonuses= EmployeeFestivalBonuse::find($id);
         return view('pages.payment.employeefestivalbonuse.edit',["employeefestivalbonuses"=>$employeefestivalbonuses]);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $employeefestivalbonuse= EmployeeFestivalBonuse::findorFail($id);
        $employeefestivalbonuse->month=$request->month;
        $employeefestivalbonuse->festival_name=$request->festival_name;
        $employeefestivalbonuse->bonus_amount=$request->bonus_amount;
        $employeefestivalbonuse->save();
        return redirect('/employeefestivalbonuses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employeefestivalbonuse= EmployeeFestivalBonuse::find($id);
        $employeefestivalbonuse->delete($id);
         return redirect('/employeefestivalbonuses');

    }
}
