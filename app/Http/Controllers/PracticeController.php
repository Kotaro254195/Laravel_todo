<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Practice;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreatePracticeRequest;
// use Illuminate\Support\Facades\Session;

class PracticeController extends Controller
{
    public function string(){
        $practices=Practice::all();
        //return view("practices.string")->with("practices",$practices);
        $str="";
        foreach($practices as $practice){
            $str=$practice->name.",";
        }
        return str;
    }

    public function index()
    {
        $practices=Practice::all();
        return view("practices.index")->with("practices",$practices);
    }

    public function view(Practice $practice){
        $practices=Practice::all();
        return View("practices.view",compact("practice","practices"));
    }

    public function showcreate(){
        $practices=Practice::all();
        return view("practices.showcreate")->with("practices",$practices);
    }
    public function store(CreatePracticeRequest $request){
        Practice::create([
            "name"=>$request->name,
            "description"=>$request->description
        ]);


        Session::flash("success","Todo Created Successfully");

        return redirect("/practices");

        
    }

    public function delete(Practice $practice){
        $practice->delete();

        Session::flash("success","Todo Deated Successfully");

        return back();
    }

    public function showedit(Practice $practice){
        $practices=Practice::all();
        return view("practices.showedit",compact("practice","practices"));
    }

    public function edit(Request $request,Practice $practice){

        $this->validate(request(),[
            "name"=>"required|min:6|max:20",
            "description"=>"required"
        ]);

        $practice->name=$request->name;
        $practice->description=$request->description;
        $practice->save();

        Session::flash("success","Todo Update Successfully");

        return redirect("/practices");
    }
     

    public function complete(Practice $practice){
        $practice->completed=true;
        $practice->save();

        Session::flash("success","Todo Completed Successfully");

        return back();
    }

    public function not_complete(Practice $practice){
        $practice->completed=false;
        $practice->save();

        Session::flash("Todo Pending...");

        return back();
    }
}