<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Leave\LeaveCategorie;

class LeaveCategorieController extends Controller
{
    
    public function index()
    {
        $leavecategories=DB::table('leave_categories')->get();
        return view('pages.leave.leavecategorie.index',['leavecategories'=>$leavecategories]);
    }

    
    public function create()
    {   

        return view('pages.leave.leavecategorie.create');
    }

    
    public function store(Request $request)
    {
        $leavecategories= new LeaveCategorie();
        $leavecategories->name=$request->name;
        $leavecategories->days=$request->days;
        $leavecategories->save();
        return redirect('/leavecategories');
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
        $leavecategories=LeaveCategorie::find($id);
        return view('pages.leave.leavecategorie.edit',['leavecategories'=>$leavecategories]);
    }

    
    public function update(Request $request, string $id)
    {    
        $leavecategorie=LeaveCategorie::findOrFail($id);
        $leavecategorie->name=$request->name;
        $leavecategorie->days=$request->days;
        $leavecategorie->save();
        return redirect('/leavecategories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leavecategorie=LeaveCategorie::find($id);
        $leavecategorie->delete();
        return redirect('/leavecategories');
    }
}
