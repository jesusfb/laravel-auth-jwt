<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        // Define variabel
        $data = ['title' => 'User List', 'users' => UserModel::all()];

        // Return view with data
        return view('user/index', $data);
    }

    public function show($id) {
        // Define variabel
        $data = ['title' => 'Detail User', 'user' => UserModel::findOrFail($id)];

        // Return view with data
        return view('user/detail', $data);
    }

    public function create() {
        // Define variabel
        $data = ['title' => 'Create User'];

        // Return view with data
        return view('user/create', $data);
    }

    public function save(Request $request) {
        // Validation rules
        $validateData = $request->validate([
            'username' => 'required|unique:tb_users,username',
            'password' => 'required',
            'role' => 'required'
        ]);

        // Hash password
        $validateData['password'] = Hash::make($validateData['password']);

        // Insert to DB
        UserModel::create($validateData);

        // Redirect to user list page
        return redirect('/user')->with('success', 'User created');
    }

    public function edit($id) {
        // Define variabel
        $data = ['title' => 'Edit User', 'user' => UserModel::findOrFail($id)];

        // Return view with data
        return view('user/edit', $data);
    }

    public function update($id, Request $request) {
        // Get data user from DB
        $user = UserModel::findOrFail($id);

        // Check if username change and set username rules
        $usernameRules = 'required';
        if($user['username'] != $request['username']) {
            $usernameRules = 'required|unique:tb_users,username';
        }
        
        // Validation rules
        $validateData = $request->validate([
            'username' => $usernameRules,
            'role' => 'required'
        ]);

        // If pasword not empty
        if(!empty($request['password'])) {
            // Hash password
            $validateData['password'] = Hash::make($request['password']);
        }

        // Update data from DB
        UserModel::where('id', $id)->update($validateData);

        // Redirect to user list page
        return redirect('/user')->with('success', 'User updated');
    }

    public function delete($id) {
        // Delete data from DB
        UserModel::destroy($id);

        // Redirect to user list page
        return redirect('/user')->with('success', 'User deleted');
    }
}
