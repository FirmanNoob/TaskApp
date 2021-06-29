<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5'
        ]);

        $data = $request->all();
        $data['api_token'] = str::random(100);
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        if ($user) {
            return $user;
        }

        return $request->all();
    }
}
