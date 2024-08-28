<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $todos = task::all();
        return view('todo', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        task::create(['title' => $request->title]);
        return redirect()->back();
    }

    public function destroy(task $todo)
    {
        $todo->delete();
        return redirect()->back();
    }
}
