<?php

namespace App\Http\Controllers\Batch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Batch\Classe;

class ClasseController extends Controller
{
    
    public function index()
    {

        $classes=DB::table("classes")->get();
       // print_r($classes);
       return view('pages.batch.classe.index',["classes"=>$classes]);
    }

   
    public function create()
    {
     return view("pages.batch.classe.create");
    //   $classe=new Classe();
    //     print_r($classe);
    }

    public function store(Request $request)
    {
        $classe=new Classe();
       
        $classe->name=$request->name;
        $classe->save();
        return redirect("/classes");
    }

    
    public function show(string $id)
    {
        $classe=Classe::find($id);
        return view("pages.batch.classe.show",["classe"=>$classe]);
    }

    
    public function edit(string $id)
    {
        $classe=Classe::find($id);
        return view("pages.batch.classe.edit",["classe"=>$classe]);
        
    }

   
    public function update(Request $request, $id)
    {     
        
        $classe = Classe::findOrFail($id);
       $classe->name = $request->input('name');

        // $classe->name = $request->name;
        $classe->update();
       
        return redirect("classes");
    }

    
    public function destroy(string $id)
    {
        $classe=Classe::find($id);
        $classe->delete();
        return redirect("classes");
    }
}
