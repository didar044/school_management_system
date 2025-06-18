<?php

namespace App\Http\Controllers\Providentfund;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Providentfund\EmployeeProvidentFund;

class EmployeeProvidentFundController extends Controller
{
    
    public function index( Request $request)
    {    
        $search = $request->input('search');
        $employeeprovidentfunds=EmployeeProvidentFund::where('employee_id', 'like', "%{$search}%")->get();
        return view('pages.providentfund.employeeprovidentfund.index',compact('employeeprovidentfunds'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
