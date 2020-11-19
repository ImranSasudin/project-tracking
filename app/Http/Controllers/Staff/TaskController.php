<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskType;
use App\Models\User;
use App\Models\Project;
use Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->get();

        return view('staff.task.index', [
            'tasks' => $tasks,
        ]);
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('staff.task.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request)
    {
        $task = Task::find($request->id);
        $task->status = $request->status;
        $task->save();

        return redirect()->route('staff.task')->withSuccess('Task succesfully updated');
    }

}
