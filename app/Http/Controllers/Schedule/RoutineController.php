<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use App\Models\Schedule\Routine;
use App\Models\Schedule\Schedule;



class RoutineController extends Controller
{
    
    public function index()
    {
       
        $day = 'Monday';

        
       return redirect()->route('routines.filter', ['day' => $day]);
    }

  
    public function filterByDay(Request $request)
    {
        $day = $request->input('day', 'Monday'); 

        $schedules = Schedule::with(['classe', 'section', 'period', 'subject','room', 'shift','employee'])
            ->where('day', $day)
            ->get();

        $grouped = $schedules->groupBy(function ($item) {
            return $item->classe_id . '-' . $item->section_id;
        });

        return view('pages.schedule.routine.index', compact('grouped', 'day'));
    }

  

}
