<?php

namespace App\Http\Controllers\Batch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Batch\Shift;


class ShiftController extends Controller
{
    
    public function index()
    {
        $shifts=DB::table("shifts")->get();
       // print_r($shifts);
        return view('pages.batch.shift.index',["shifts"=>$shifts]);
    }

    
    public function create()
    {
        return view("pages.batch.shift.create");
    }

   
    public function store(Request $request)
    {
        $shifts=new Shift();
        $shifts->name=$request->name;
        $shifts->save();
        return redirect('/shifts');
    }

   
    public function show(string $id)
    {
        $shifts=Shift::find($id);
        return view("pages.batch.shift.show",["shifts"=>$shifts]);
    }

   
    public function edit(string $id)
    {
        $shifts=Shift::find($id);
        return view ("pages.batch.shift.edit",["shifts"=>$shifts]);

    }

    
    public function update(Request $request, $id)
    {
        $shifts = Shift::findOrFail($id);
        $shifts->name = $request->input('name');
        $shifts->update();
        return redirect('/shifts');
    }

    
    public function destroy(string $id)
    {    
        
        $shifts=Shift::find($id);
        $shifts->delete();
        return redirect('/shifts');
    }
}
