<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function view()
    {
        $user = Auth::user();

        return view('account.view', [
            'user' => $user,
        ]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('account.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        request()->validate([
            'email' => 'unique:users,email,' . Auth::id(),
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if(Auth::user()->role == "client"){
            $user->company = $request->company;
        }
        $user->save();

        return redirect()->route('account.view')->withSuccess('Account succesfully updated');
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::id());
        $realPassword = $user->password;
        $currentPassword = $request->currentPass;
        $newPassword = $request->newPass;
        $reenterNewPassword = $request->reNewPass;

        if (!Hash::check($currentPassword, $realPassword)) {
            return redirect()->route('account.edit')->withErrors(['Incorrect current password']);
        } else if ($newPassword != $reenterNewPassword) {
            return redirect()->route('account.edit')->withErrors(['New password not matching. Please re-enter properly']);
        } else {
            $user->password = Hash::make($newPassword);
            $user->save();
            return redirect()->route('account.view')->withSuccess('Password succesfully updated');
        }

    }
}
