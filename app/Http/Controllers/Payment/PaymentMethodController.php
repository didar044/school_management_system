<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment\PaymentMethod;

class PaymentMethodController extends Controller
{
   
    public function index()
    {
        $paymentmethods=PaymentMethod::all();
        return view("pages.payment.paymentmethod.index",["paymentmethods"=>$paymentmethods]);
    }

    
    public function create()
    {
        return view("pages.payment.paymentmethod.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paymentmethods=new PaymentMethod();
        $paymentmethods->name=$request->name;
        $paymentmethods->type=$request->type;
        $paymentmethods->details=$request->details;
        $paymentmethods->status=$request->status;
        $paymentmethods->save();
        return redirect('/paymentmethods');
    }

    
    public function show(string $id)
    {
       
    }

    
    public function edit(string $id)
    {
         $paymentmethods=PaymentMethod::find($id);
         return view("pages.payment.paymentmethod.edit",["paymentmethods"=>$paymentmethods]);
    }

    
    public function update(Request $request, string $id)
    {
        $paymentmethod=PaymentMethod::findorFail($id);
        $paymentmethod->name=$request->name;
        $paymentmethod->type=$request->type;
        $paymentmethod->details=$request->details;
        $paymentmethod->status=$request->status;
        $paymentmethod->save();
        return redirect('/paymentmethods');
    }

   
    public function destroy(string $id)
    {
        $paymentmethod=PaymentMethod::find($id);
        $paymentmethod->delete();
        return redirect('/paymentmethods');
    }
}
