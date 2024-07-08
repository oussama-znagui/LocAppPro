<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    //

    public function registerIndex()
    {
        return view('Auth.register');
    }

    public function register(StoreUserRequest $request)
    {
        if ($request->password != $request->confirm_password) {
            return redirect()->route('register')
                ->with('passwordMessage', 'les deux mot de pass ne sont pas identiques');
        }
        if ($request->role == 'client') {
            $request->role = 0;
        } else {
            $request->role = 1;
        }
        // dd($request->cin);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cin' => $request->cin,
            'role' => $request->role,
            'password' => $request->password,
        ]);

        if ($request->role == 0) {
            Tenant::create(
                ['user_id' => $user->id],
            );
            auth()->login($user);
            return redirect('/');
        } else {
            Admin::create(
                ['user_id' => $user->id],

            );
            auth()->login($user);
            return redirect('/dashboard');
        }
    }

    public function loginIndex()
    {
        return view('Auth.login');
    }

    public function login(LoginRequest $request)
    {
        $infos = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($infos)) {


            if (Auth::User()->role == 0) {

                return redirect('/');
            } else {
                return redirect('/dashboard');
            };
        };

        return to_route('Auth.login')->withErrors([
            'error' => "Email or password invalide"
        ])->onlyInput('email');
    }
}
