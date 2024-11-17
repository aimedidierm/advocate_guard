<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        if ($user != null) {
            $passwordMatch = Hash::check($password, $user->password);
            if ($passwordMatch) {
                Auth::login($user);
                if (Auth::user()->role == UserRole::ADMIN->value) {
                    return redirect("/admin");
                } elseif (Auth::user()->role == UserRole::COMMUNITY->value) {
                    return redirect("/community");
                } else {
                    return redirect("/child");
                }
            } else {
                return redirect(route('login'))->withErrors(['msg' => 'Incorect password']);
            }
        } else {
            return redirect(route('login'))->withErrors(['msg' => 'Incorect email and password']);
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect(route("login"));
        } else {
            return back();
        }
    }

    public function register(RegisterRequest $request)
    {
        User::create(
            [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
                'id_number' => $request->input('id_number'),
                'gender' => $request->input('gender'),
                'phone_number' => $request->input('phone_number'),
                'country' => $request->input('country'),
                'address' => $request->input('address'),
                'password' => bcrypt($request->input('password')),
            ]
        );

        return redirect()->route('login')->with('success', 'Your account created successfully!');
    }
}
