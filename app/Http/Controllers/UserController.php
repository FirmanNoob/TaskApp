<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $data_user = \App\Models\User::all();
        return view('user.index', ['data_user' => $data_user]);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'jabatan' => 'required',
            'password' => 'required|string|min:5',
            'avatar' => 'required|max:5120|mimes:jpeg,jpg,png',
        ]);
        $user = \App\Models\User::create([
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jabatan' => $request->jabatan,
            'avatar' => $request->avatar,
        ]);
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $user->avatar = $request->file('avatar')->getClientOriginalName();
            $user->save();
        }

        return redirect('/listuser')->with('success', 'Task Created Successfully!');
    }
    public function profile()
    {
        return view('user.profile');
    }
    public function editProfile($id)
    {
        $jabatan = \App\Models\Jabatan::all();
        $data = \App\Models\User::find($id);
        return view('user.editProfile', ['data' => $data, 'jabatan' => $jabatan]);
    }
    public function updateProfile(Request $request, $id)
    {
        // $data->update($request->all());
        $user = \App\Models\User::find($id);
        $user->name = $request->input('name');
        $user->jabatan = $request->input('jabatan');
        $user->password = Hash::make($request->password);
        $user->avatar = $request->input('avatar');
        $user->save();
        return redirect('/profile')->with('question', 'Apakah Anda Ingin Mengubah Data');
    }
    public function delete($id)
    {
        $data = \App\Models\User::find($id);
        $data->delete();
        return redirect('/listuser')->with('warning', 'Data User Berhasil Dihapus');
    }
    public function view($id)
    {
        $data = \App\Models\User::find($id);
        return view('admin.view', compact('data'));
    }
    public function edit($id)
    {
        $jabatan = \App\Models\Jabatan::all();
        $data = \App\Models\User::find($id);
        return view('admin.edit', ['data' => $data, 'jabatan' => $jabatan]);
    }
    public function update(Request $request, $id)
    {
        // $data->update($request->all());
        $user = \App\Models\User::find($id);
        $user->name = $request->input('name');
        $user->jabatan = $request->input('jabatan');
        $user->password = Hash::make($request->password);
        $user->avatar = $request->input('avatar');
        $user->save();

        return redirect('/listuser')->with('question', 'Apakah Anda Ingin Mengubah Data');
    }
    public function diskusi(Request $request)
    {
        $message = \App\Models\Chat::all();
        return view('user.diskusi', ['message' => $message]);
    }
    public function createDiskusi(Request $request)
    {
        $request->request->add(['user_id' => auth()->user()->id]);
        \App\Models\Chat::create($request->all());
        return redirect('/discussion')->with('sukses', 'Data Berhasil Ditambahkan');
    }
}
