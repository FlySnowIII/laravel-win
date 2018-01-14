<?php

namespace App\Http\Controllers\Todo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CMS\Todo;

class TodoController extends Controller
{
    //
    public function index(){
        $todo = Todo::all();

        return view("todo.index", ['todolist' => $todo]);
    }

    public function update(Request $request){

        $todo = new Todo($request->all());

        $todo->url = "temp/img/001.jpg";
        
        $todo->save();

        // return $todo;
        return redirect("todo");
    }
    
    public function destroy(Request $request,Todo $todo){

        $todo->delete();

        return redirect("todo");
    }
}
