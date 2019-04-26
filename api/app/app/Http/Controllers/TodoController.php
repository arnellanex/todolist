<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function createTodo(Request $request) {
        $todo = new Todo();
        $todo->fill($request->all());

        return ($todo->save()) ? 
            $this->respond($todo) :
            $this->respondWithErrors($this->lastErrors, 422);
    }

    public function updateTodo(Request $request, $id) {
        $todo = Todo::find($id);
        $todo->title = $request->input('title');
        $todo->completed = $request->input('completed');
        $todo->save();

        return response()->json($todo);
    }

    public function deleteTodo($id) {
        $todo = Todo::find($id);
        $todo->delete();

        return response()->json($todo);
    }

    public function index() {
        $todos = Todo::all();

        return response()->json($todos);
    }
}