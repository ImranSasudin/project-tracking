<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('progress')->get();

        return view('staff.project.index', [
            'projects' => $projects,
        ]);
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $files = ProjectFile::where('project_id', $id)->get();

        return view('staff.project.edit', [
            'project' => $project,
            'files' => $files,
        ]);
    }

    public function updateFile(Request $request)
    {
        $projectFile = new ProjectFile();
        $projectFile->file_name = $request->file_name;
        $projectFile->project_id = $request->id;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $name = md5(microtime() . $file->getClientOriginalName());
            $fileName = $name . '.' . $file->extension();
            // Insert file into folder
            $path = $file->storeAs('public/project', $fileName);
            // Remove 'public/' in path to store in DB
            $path = Str::replaceFirst('public/', '', $path);

            $projectFile->file_path = $path;
        }

        $projectFile->save();

        return redirect()->route('staff.project.edit', $projectFile->project_id);
    }
}
