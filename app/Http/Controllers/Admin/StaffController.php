<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function dashboard()
    {
        return view('staff.dashboard');
    }

    public function index()
    {
        $staffs = User::whereIn('role', ['staff', 'admin'])->get();

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

    public function edit($id)
    {
        $staff = User::find($id);
        $admins = User::where('role','admin')->get();

        return view('admin.staff.edit', [
            'staff' => $staff,
            'admins' => $admins
        ]);
    }

    public function update(Request $request)
    {
        request()->validate([
            'email' => 'unique:users,email,' . $request->id,
        ]);
        
        $staff = User::find($request->id);
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

        return redirect()->route('admin.staff')->withSuccess('Staff succesfully updated');
    }

    public function delete($id)
    {
        $staff = User::destroy($id);

        return redirect()->route('admin.staff')->withSuccess('Staff succesfully deleted');
    }
}
