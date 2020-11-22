<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use DB;
use App\Models\Progress;
use App\Models\ProjectFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('progress')->get();

        return view('admin.project.index', [
            'projects' => $projects,
        ]);
    }

    public function create()
    {
        $clients = User::where('role','client')->get();

        return view('admin.project.create', [
            'clients' => $clients,
        ]);
    }

    public function store(Request $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->type = $request->type;
        $project->date = $request->date;
        $project->client_id = $request->client;
        $project->save();

        return redirect()->route('admin.project')->withSuccess('New project successfully created');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $clients = User::where('role','client')->get();
        $progress = DB::table('checklists')
                    ->leftJoin('progress', function($join) use ($id)
                    {
                        $join->on('checklists.id', '=', 'progress.checklist_id')
                            ->where('progress.project_id', '=', $id);
                    })
                    ->orderBy('number')
                    ->get();

        $files = ProjectFile::where('project_id', $id)->get();

        return view('admin.project.edit', [
            'project' => $project,
            'progress' => $progress,
            'clients' => $clients,
            'files' => $files,
        ]);
    }

    public function update(Request $request)
    {
        $project = Project::find($request->id);
        $project->name = $request->name;
        $project->type = $request->type;
        $project->date = $request->date;
        $project->client_id = $request->client;
        $project->save();

        return redirect()->route('admin.project')->withSuccess('Project succesfully updated');
    }

    public function updateProgress(Request $request)
    {
        $progress = Progress::where('project_id', $request->id)->delete();
        
        if($request->checklist != null){
            foreach($request->checklist as $checklist)
            {
                $progress2 = new Progress();
                $progress2->project_id = $request->id;
                $progress2->updated_by = Auth::user()->id;
                $progress2->checklist_id = $checklist;
                $progress2->save();
            }
        }

        return redirect()->route('admin.project')->withSuccess('Project progress succesfully updated');
    }

    public function delete($id)
    {
        $project = Project::destroy($id);

        return redirect()->route('admin.project')->withSuccess('Project succesfully deleted');
    }

    public function updateFile(Request $request)
    {
        $projectFile = new ProjectFile();
        $projectFile->file_name = $request->file_name;
        $projectFile->project_id = $request->id;

        if ($request->hasfile('file')) {
            Storage::delete('public/' . $projectFile->file_path);
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

        return redirect()->route('admin.project.edit', $projectFile->project_id);
    }

    public function deleteFile($id)
    {
        $projectFile = ProjectFile::find($id);
        Storage::delete('public/' . $projectFile->file_path);
        $projectFile->delete();

        return redirect()->route('admin.project.edit', $projectFile->project_id);
    }
}
