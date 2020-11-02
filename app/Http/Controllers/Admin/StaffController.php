<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = User::where('role', 'staff')->get();

        return view('admin.staff.index', [
            'staffs' => $staffs,
        ]);
    }

    public function create()
    {
        $admins = User::where('role','admin')->get();

        return view('admin.staff.create', [
            'admins' => $admins
        ]);
    }

    public function store(Request $request)
    {
        $staff = new User();
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->password = Hash::make($request->password);
        $staff->phone = $request->phone;
        $staff->address = $request->address;
        $staff->role = $request->role;
        if($request->role == "staff"){
            $staff->manager_id = $request->manager;
        }
        $staff->save();

        return redirect()->route('admin.staff')->withSuccess('New staff successfully created');
        
    }
}
