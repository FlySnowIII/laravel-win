<?php

namespace App\Http\Controllers\Todo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CMS\Todo;

use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    //
    public function index(){
        $todo = Todo::all();

        return view("todo.index", ['todolist' => $todo]);
    }

    public function update(Request $request){

        $todo = new Todo($request->all());

 
        // $path = $request->file('pic')->storeAs(
        //     'pic', $todo->title
        // );

        $photo = $request->file('photo');
        $extension = $photo->extension();
        $store_result = $photo->store('public/todo');
        // $store_result = $photo->storeAs('public/photo', 'test.jpg');
        $url = Storage::url($store_result);
        // $output = [
        //     'extension' => $extension,
        //     'store_result' => $store_result,
        //     'url' => $url
        // ];

        // return $output;

        $todo->url = $url;

        $todo->save();

        return redirect("todo");
    }
    
    public function destroy(Request $request,Todo $todo){

        $todo->delete();

        return redirect("todo");
    }
}
