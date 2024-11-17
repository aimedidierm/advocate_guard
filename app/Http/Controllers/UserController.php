<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user->role == UserRole::ADMIN->value) {
            return redirect('/admin/users')->withErrors("You can't delete Admin user");
        }
        if ($user) {
            $user->delete();
            return redirect('/admin/users')->with('success', 'User deleted successfully.');
        } else {
            return redirect('/admin/users')->withErrors('User not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|numeric',
            'country' => 'required|string',
            'address' => 'required|string',
            'password' => 'required|string',
            'confirmPassword' => 'required|string',
        ]);
        $user = User::find(Auth::id());
        if ($request->password == $request->confirmPassword) {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone_number = $request->phone_number;
            $user->address = $request->address;
            $user->country = $request->country;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->update();
            if (Auth::user()->role == UserRole::ADMIN->value) {
                return redirect('/admin/settings')->with('success', 'Account details updated successfully.');
            } elseif (Auth::user()->role == UserRole::COMMUNITY->value) {
                return redirect('/child/settings')->with('success', 'Account details updated successfully.');
            } else {
                return redirect('/child/settings')->with('success', 'Account details updated successfully.');
            }

            return redirect('/employer/settings');
        } else {
            return back()->withErrors('Passwords not match');
        }
    }
}
