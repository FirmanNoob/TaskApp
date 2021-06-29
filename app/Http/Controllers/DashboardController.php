<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use illuminate\Http\Response;

class DashboardController extends Controller
{
    public function index()
    {
        // $response = Http::get('https://api.kawalcorona.com/indonesia');
        // $corona = $response->json();
        // return view('dashboards.index')->with(compact('corona'));
        $data = \App\Models\Task::where('user_id', auth()->user()->id)->get();
        return view('dashboards.index', ['data' => $data]);
    }
    public function task()
    {
        $data_task = Task::all();
        $count = DB::table('task')->get()->count('qty');
        return view('admin.index', ['data_task' => $data_task])->with('qty', $count);
    }

    public function create(Request $request)
    {
        $request->request->add(['user_id' => auth()->user()->id]);
        $messages = [
            // 'unique' => ':attribute Task harus DIISI!!',
            'unique' => 'Task tidak boleh di isi dengan data yang sama',
        ];
        $this->validate($request, [
            'task' => 'required|unique:task',
        ], $messages);
        \App\Models\Task::create($request->all());
        return redirect('/task')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function login()
    {
        return view('auths.login');
    }

    public function make()
    {
        $data = \App\Models\User::all();
        return view('user.make', compact('data'));
    }

    public function delete($id)
    {
        $data = \App\Models\Task::find($id);
        $data->delete();
        return redirect('/task')->with('warning', 'Task Berhasil Dihapus');
    }

    public function detail($id)
    {
        $data = \App\Models\Task::find($id);
        return view('admin.detail', ['data' => $data]);
    }
    public function edit($id)
    {
        $data = \App\Models\Task::find($id);
        $user = \App\Models\User::all();
        return view('user.edit', ['data' => $data, 'user' => $user]);
    }
    public function update(Request $request, $id)
    {
        $task =  \App\Models\Task::find($id);
        $task->update($request->all());
        return redirect('/task')->with('question', 'Apakah Anda Ingin Mengubah Data');
    }
    function dokumen()
    {
        $data = \App\Models\Task::where('user_id', auth()->user()->id)->get();
        return view('user.dokumen', ['data' => $data]);
    }
}
