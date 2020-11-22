<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;

class StaffController extends Controller
{
    public function dashboard()
    {
        $staff = User::whereIn('role',['staff','admin'])->count();
        $client = User::where('role','client')->count();
        $project = Project::count();

        return view('staff.dashboard', [
            'staff' => $staff,
            'client' => $client,
            'project' => $project,
        ]);
    }
}
