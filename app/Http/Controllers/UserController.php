<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

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
}
