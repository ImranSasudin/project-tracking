<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

class AdminController extends Controller
{
    public function dashboard()
    {
        $staff = User::whereIn('role',['staff','admin'])->count();
        $client = User::where('role','client')->count();
        $project = Project::count();

        return view('admin.dashboard',[
            'staff' => $staff,
            'client' => $client,
            'project' => $project,
        ]);
    }
}
