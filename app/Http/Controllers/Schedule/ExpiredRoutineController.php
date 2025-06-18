<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use App\Models\Schedule\Routine;
use App\Models\Schedule\Schedule;



class RoutineController extends Controller
{ 
    public function index(Request $request)
    {    

            $day = $request->input('day');  // E.g., Monday 
            $routines = Schedule::where('day', $day)->get();
   
            return view('pages.schedule.routine.index', compact('routines', 'day'));
        
    }

  
    public function show()
    {
        
    }

    // Shared method to fetch schedules
  

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
