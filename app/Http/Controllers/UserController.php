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
        $users = User::paginate(10);
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
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            if ($request->hasFile('profile_image')) {
                $imagePath = $request->file('profile_image')->store('profile_images', 'public');
                $user->profile_image = $imagePath;
            }
            $user->update();
            if (Auth::user()->role == UserRole::ADMIN->value) {
                return redirect('/admin/settings')->with('success', 'Account details updated successfully.');
            } elseif (Auth::user()->role == UserRole::COMMUNITY->value) {
                return redirect('/community/settings')->with('success', 'Account details updated successfully.');
            } else {
                return redirect('/child/settings')->with('success', 'Account details updated successfully.');
            }

        } else {
            return back()->withErrors('Passwords not match');
        }
    }

    // admin update for user accounts
    public function updateUser(Request $request)
{
    $request->validate([
        'userId' => 'required',
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'id_number' => 'required',
        'phone_number' => 'required|numeric',
        'country' => 'required|string',
        'address' => 'required|string',
        'password' => 'required|string',
        'confirm_Password' => 'required|string',
    ]);

    $user = User::find($request->userId);

    if ($request->password === $request->confirm_Password) {
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->id_number = $request->id_number;
        $user->phone_number = $request->phone_number;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->update();

        return redirect('/admin/users')->with('success', 'User details updated successfully.');
    } else {
        return back()->withErrors('Passwords do not match.');
    }
}
    

}
