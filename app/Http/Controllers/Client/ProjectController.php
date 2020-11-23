<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use DB;
use App\Models\ProjectFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('progress')
                ->where('client_id', Auth::user()->id)
                ->get();

        return view('client.project.index', [
            'projects' => $projects,
        ]);
    }

    public function create()
    {
        return view('client.project.create');
    }

    public function store(Request $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->type = $request->type;
        $project->date = $request->date;
        $project->client_id = Auth::user()->id;
        $project->save();

        return redirect()->route('client.project')->withSuccess('New project successfully created');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $files = ProjectFile::where('project_id', $id)->get();

        return view('client.project.edit', [
            'project' => $project,
            'files' => $files,
        ]);
    }

    public function update(Request $request)
    {
        $project = Project::find($request->id);
        $project->name = $request->name;
        $project->type = $request->type;
        $project->date = $request->date;
        $project->save();

        return redirect()->route('client.project')->withSuccess('Project succesfully updated');
    }

   public function view($id)
   {
        $progress = DB::table('checklists')
                    ->leftJoin('progress', function($join) use ($id)
                    {
                        $join->on('checklists.id', '=', 'progress.checklist_id')
                            ->where('progress.project_id', '=', $id);
                    })
                    ->orderBy('number')
                    ->get();

        $project = Project::find($id);

        return view('client.project.progress', [
            'progress' => $progress,
            'project' => $project,
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

        return redirect()->route('client.project.edit', $projectFile->project_id);
    }

}
