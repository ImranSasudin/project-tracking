<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ClientController extends Controller
{
    public function dashboard()
    {
        $project = Project::count();

        return view('client.dashboard', [
            'project' => $project,
        ]);
    }
}
