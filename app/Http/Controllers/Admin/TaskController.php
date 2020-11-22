<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskType;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
        $task->file_name = $request->file_name;

        $file = $request->file('file');
        $name = md5(microtime() . $file->getClientOriginalName());
        $fileName = $name . '.' . $file->extension();
        // Insert file into folder
        $path = $file->storeAs('public/task', $fileName);
        // Remove 'public/' in path to store in DB
        $path = Str::replaceFirst('public/', '', $path);
        
        $task->file_path = $path;

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
        $task->file_name = $request->file_name;
        
        if ($request->hasfile('file')) {
            Storage::delete('public/' . $task->file_path);
            $file = $request->file('file');
            $name = md5(microtime() . $file->getClientOriginalName());
            $fileName = $name . '.' . $file->extension();
            // Insert file into folder
            $path = $file->storeAs('public/task', $fileName);
            // Remove 'public/' in path to store in DB
            $path = Str::replaceFirst('public/', '', $path);

            $task->file_path = $path;
        }

        $task->save();

        return redirect()->route('admin.task')->withSuccess('Task succesfully updated');
    }

    public function delete($id)
    {
        $task = Task::find($id);
        Storage::delete('public/' . $task->file_path);
        $task->delete();

        return redirect()->route('admin.task')->withSuccess('Task succesfully deleted');
    }
}
