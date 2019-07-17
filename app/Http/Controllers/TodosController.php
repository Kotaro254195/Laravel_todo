<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateTodoRequest;

class TodosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $todos=Todo::all();
        return view("todos.index")->with("todos",$todos);
    }
    public function show(Todo $todo){
        //$todo=Todo::find($id);
        //route Model Binding
        return view("todos.show")->with("todo",$todo);
    }

    public function delete(Todo $todo){
        $todo->delete();

        Session::flash("success","Todo Deated Successfully");


        return redirect("/todos");
    }    

    public function create(){
        return view("todos.create");
    }

    public function store(CreateTodoRequest $request){

        //dd($request->all());
        
        // $this->validate($request,[  //validateの意味は"検証"
        //     'name'=>'required | min:6|max:20', //requiredはnull的な
        //     'description'=>'required'
        // ]);


        // $todo=new Todo();
        // $todo->name=$request->name;
        // $todo->description=$request->description;
        // $todo->save();
        
        //Mass Assignment
        Todo::create([
            "name"=>$request->name,
            "description"=>$request->description
        ]);


        Session::flash("success","Todo Created Successfully");

        return redirect("/todos");
    }

    public function edit(Todo $todo){
        return view("todos.edit")->with("todo",$todo);
    }

    public function update(Request $request,Todo $todo){

        $this->validate(request(),[
            "name"=>"required|min:6|max:20",
            "description"=>"required"
        ]);

        //dont need instance
        $todo->name=$request->name;
        $todo->description=$request->description;
        $todo->save();

        Session::flash("success","Todo Update Successfully");

        return redirect("/todos");
    }

    public function complete(Todo $todo){

        $todo->completed=true;
        $todo->save();

        Session::flash("success","Todo Completed Successfully");

        return redirect("/todos");

    }

    public function not_complete(Todo $todo){

        $todo->completed=false;
        $todo->save();

        Session::flash("success","Todo Pending...");


        return redirect("/todos");
    }

}
