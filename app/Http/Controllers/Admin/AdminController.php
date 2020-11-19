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
        $user = User::count();

        return view('admin.dashboard',[
            'user' => $user,
        ]);
    }
}
