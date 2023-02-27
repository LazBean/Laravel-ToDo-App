<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(){
        //Get all of the tasks when visit homepage
        $tasks = Task:: orderBy('completed', 'ASC') -> orderBy('due_at', 'ASC') -> orderBy('id', 'DESC') -> get();
        

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create(){
        return view('tasks.create');
    }

    public function edit($id){
        $task = Task::where('id', $id)->first();

        return view('tasks.edit', ['task' => $task]);
    }

    public function store(){
        request()->validate(['description' => 'required|max:255',]);

        $task = Task::create([
            'description' => request('description'),
        ]);

        $task->due_at = request('due_at');
        $task->save();
        
        //Return to the homepage when a task is created
        return redirect('/');
    }

    public function complete($id){
        $task = Task::where('id', $id)->first();

        $task->completed = true;
        $task->completed_at = now();
        $task->save();

        return redirect('/');
    }

    public function update(Request $request, $id){

        request()->validate(['updated_description' => 'required|max:255',]);

        $task = Task::where('id', $id)->first();

        $task->description = $request->updated_description;
        $task->due_at = $request->updated_due_at;

        if($request->has('updated_completed')){
            $task->completed = true;
            $task->completed_at = now();
        }else{
            $task->completed = false;
        }

        $task->save();

        return redirect('/');
    }

    public function delete($id){
        $task = Task::where('id', $id)->first();

        $task->delete();

        return redirect('/');
    }
}
