<?php

namespace App\Http\Controllers\Admin;

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
        $tasks = Task::all();

        return view('admin.task.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        $tasks = TaskType::all();
        $staffs = User::where('role','staff')->get();
        $projects = Project::all();

        return view('admin.task.create', [
            'tasks' => $tasks,
            'staffs' => $staffs,
            'projects' => $projects,
        ]);
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->project_id = $request->project;
        $task->task_type = $request->task;
        $task->user_id = $request->staff;
        $task->description = $request->description;
        $task->assigned_by = Auth::user()->id;
        $task->status = 'In Progress';
        $task->save();

        return redirect()->route('admin.task')->withSuccess('New task successfully created');
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('admin.task.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request)
    {
        $task = Task::find($request->id);
        $task->description = $request->description;
        $task->save();

        return redirect()->route('admin.task')->withSuccess('Task succesfully updated');
    }

    public function delete($id)
    {
        $Task = Task::destroy($id);

        return redirect()->route('admin.task')->withSuccess('Task succesfully deleted');
    }
}
