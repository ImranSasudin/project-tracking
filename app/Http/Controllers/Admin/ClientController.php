<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class ClientController extends Controller
{
    public function dashboard()
    {
        return view('client.dashboard');
    }

    public function index()
    {
        $clients = User::where('role', 'client')->get();

        return view('admin.client.index', [
            'clients' => $clients,
        ]);
    }

    public function create()
    {
        return view('admin.client.create');
    }

    public function store(Request $request)
    {
        $client = new User();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->role = 'client';
        $client->company = $request->company;
        $client->save();

        return redirect()->route('admin.client')->withSuccess('New client successfully created');
    }

    public function edit($id)
    {
        $client = User::find($id);

        return view('admin.client.edit', [
            'client' => $client,
        ]);
    }

    public function update(Request $request)
    {
        request()->validate([
            'email' => 'unique:users,email,' . $request->id,
        ]);
        
        $client = User::find($request->id);
        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->role = 'client';
        $client->company = $request->company;
        $client->save();

        return redirect()->route('admin.client')->withSuccess('Client succesfully updated');
    }

    public function delete($id)
    {
        $client = User::destroy($id);

        return redirect()->route('admin.client')->withSuccess('Client succesfully deleted');
    }
}
