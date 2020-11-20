<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use DB;
use App\Models\Progress;
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

        return view('client.project.edit', [
            'project' => $project,
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

        return view('client.project.edit', [
            'project' => $project,
            'progress' => $progress,
            'clients' => $clients,
        ]);
   }

}
