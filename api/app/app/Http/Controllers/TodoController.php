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

        return $this->respond($todo);
    }

    public function deleteTodo($id) {
        $todo = Todo::find($id);
        $todo->delete();

        return $this->respond($todo);
    }

    public function index() {
        $todos = Todo::latest('created_at')->get();

        return response()->json($todos);
    }
}