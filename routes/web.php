<?php


use App\Practice;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('welcome');
});

Route :: view ("/welcome","welcome")->name("home");

Route :: get("/user",function(){
    return "Welcome to laravel";
});

Route :: get("/user2",function(){
    return "<h2>Welcome to laravel</h2>";
});

Route :: get('/user/{name}/{id}',function($name,$id){
    return "hello ".$name."with Id ".$id;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::view("/about","about");

//7/8
Route::get("/about","PagesController@about")->name("about");
Route::get("/services","PagesController@services")->name("services");
Route::get("/pushme","PagesController@pushme")->name("pushme");
//7/9
// Route::get("/todos",'TodosController@index');
// Route::get("/todos/{todo}","TodosController@show");
// Route::get("/todos/delete/{todo}","TodosController@delete")->name("todos.delete");
// Route::POST("/store-todos","TodosController@store")->name("todos.store");
// Route::get("/new-todos","TodosController@create")->name("todos.create");
//7/10
// Route::get("/edit/{todo}","TodosController@edit")->name("todos.edit");
// Route::post("/update/{todo}","TodosController@update")->name("todos.update");
//7/10
// Route::get("/todos/{todo}/complete","TodosController@complete");
// Route::get("/todos/{todo}/not-complete","TodosController@not_complete");

//Practice
Route :: get("/string",function(){
    $practices=Practice::all();
    $str="";
    foreach($practices as $practice)
    {
        $str.=$practice->name;
        $str.="";
    }
    return $str;
});

//AIzaSyAN-LNhThpBcwkA8uC7ZC6dr_z8hVbDhtk

Route::get("/practices",[
    "uses"=>"PracticeController@index",
    "as"=>"practices"
]);
Route::get("/practices-view/{practice}",[
    "uses"=>"PracticeController@view",
    "as"=>"practices.index"
]);
Route::post("/practices/store",[
    "uses"=>"PracticeController@store",
    "as"=>"practice.index"
]);
Route::get("/practices-create",[
    "uses"=>"PracticeController@showcreate",
    "as"=>"practice.showcreate"
]);
Route::get("/practices/delete/{practice}",[
    "uses"=>"PracticeController@delete",
    "as"=>"practice.index"
]);
Route::get("/practices-edit/{practice}",[
    "uses"=>"PracticeController@showedit",
    "as"=>"practice.showedit"
]);
Route::post("/practices-edit-update/{practice}",[
    "uses"=>"PracticeController@edit",
    "as"=>"practice.showedit"
]);
Route::get("/practices/{practice}/complete",[
    "uses"=>"PracticeController@complete",
    "as"=>"practice.index"
]);
Route::get("/practices/{practice}/not-complete",[
    "uses"=>"PracticeController@not_complete",
    "as"=>"practice.index"
]);
// Route::get("/string",[
//     "uses"=>"PracticeController@string",
//     "as"=>"practices.string"
// ]);

Route::group(["middleware"=>"auth"], function(){

    //Route::get("/todos",'TodosController@index'); とsame
    Route::get("/todos",[
        "uses"=>"TodosController@index",
        "as"=>"todos"
    ]); 
    Route::get("/todos/{todo}",[
        "uses"=>"TodosController@show",
        "as"=>"todos.show"
    ]);
    Route::get("/todos/delete/{todo}",[
        "uses"=>"TodosController@delete",
        "as"=>"todos.delete"
    ]);
    Route::post("/store/todos",[
        "uses"=>"TodosController@store",
        "as"=>"todos.store"
    ]);
    Route::get("/new-todos",[
        "uses"=>"TodosController@create",
        "as"=>"todos.create"
    ]);
    
    Route::get("/edit/{todo}",[
        "uses"=>"TodosController@edit",
        "as"=>"todos.edit"
    ]);
    Route::post("/update/{todo}",[
        "uses"=>"TodosController@update",
        "as"=>"todos.update"
    ]);
    
    Route::get("/todos/{todo}/complete",[
        "uses"=>"TodosController@complete",
        "as"=>"todos.complete"
    ]);
    Route::get("/todos/{todo}/not-complete",[
        "uses"=>"TodosController@not_complete",
        "as"=>"todos.not_complete"
    ]);

    
});

/* 7/11 */
Route::group(["middleware"=>"admin"],function(){
    Route::get("/settings",[
        "uses"=>"SettingsController@index",
        "as"=>"settings"
    ]);
    
    Route::post("/settings/update",[
        "uses"=>"SettingsController@update",
        "as"=>"settings.update"
    ]);
});
