<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule\Period;
class PeriodController extends Controller
{
    
    public function index()
    {
        $periods=DB::table("periods")->get();
        return view('pages.schedule.period.index',["periods"=>$periods]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.schedule.period.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $periods=new Period();
        $periods->name=$request->name;
        $periods->period_start=$request->period_start;
        $periods->period_end=$request->period_end;
        $periods->save();
        return redirect('/periods');
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
        $periods=Period::find($id);
        return view('pages.schedule.period.edit',["periods"=>$periods]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Period $period)
    {
        $period->name=$request->name;
        $period->period_start=$request->period_start;
        $period->period_end=$request->period_end;
        $period->save();
        return redirect('/periods');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $periods=Period::find($id);
        $periods->delete();
         return redirect('/periods');
    }
}
