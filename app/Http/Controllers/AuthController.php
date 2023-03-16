<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        // Define variabel
        $data = ['title' => 'Form Login'];

        // Return view with data
        return view('auth/login', $data);
    }

    public function login_check(Request $request)
    {
        // Validate request
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Get data user from DB
        $user = UserModel::where('username', $request['username'])->first();

        // Check username and password
        if ($user) {
            if (Hash::check($request['password'], $user['password'])) {
                // Login success and Generate session
                $request->session()->regenerate();
                $request->session()->put('id', $user['id']);
                $request->session()->put('username', $user['username']);
                $request->session()->put('role', $user['role']);
                $request->session()->put('isLogin', true);
                return redirect('/user');
            }
        }

        // If login fail redirect back with message
        return back()->with('loginFail', 'Username and password not match !');
    }

    public function logout()
    {
        // Destroy all session and regenerate session ID
        request()->session()->flush();
        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect('/');
    }
}
