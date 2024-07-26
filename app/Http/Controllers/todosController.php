<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todos;

class todosController extends Controller
{
    public function index(){
        $todos=todos::all();
        $data=compact('todos');
        return view("welcome")->with($data);
    }
    
    public function store(Request $request){
        $request->validate(
            [
                'name'=>'required|max:255',
                'description'=>'required|max:255',
                'author' => 'required|max:50',
                'date'=>'required'
            ]
            );
            $todo = new todos;
            $todo->name=$request['name'];
            $todo->description=$request['description'];
            $todo->author=$request['author'];
            $todo->date=$request['date'];
            $todo->save();
            return redirect()->route("todo.home")->with('success','Citation added successfully !');
        }
    
    public function delete($id){
        todos::find($id)->delete();
        return redirect()->route("todo.home")->with('success','Citation deleted successfully');
    }

    public function edit($id){
        $todo=todos::find($id);
        $data=compact('todo');
        return view("layouts.update")->with($data);
    }

    public function updateData(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'description'=>'required',
                'author'=>'required',
                'date'=>'required'
            ]
            );
            $id = $request['id'];
            $todo=todos::find($id);            
            
            $todo->name=$request['name'];
            $todo->description=$request['description'];
            $todo->author=$request['author'];
            $todo->date=$request['date'];
            $todo->save();
            return redirect()->route("todo.home")->with('success', 'Citation updated successfully');
    }
}
