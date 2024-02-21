<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(UserDataTable $table)
    {
        if (Auth::user()->level) {
            return $table->render('User.index');
        } else {
            return redirect()->route('user.edit', Auth::id());
        }
    }

    public function create()
    {
        $level = [
            0 => 'Petugas',
            1 => 'Admin'
        ];
        return view('User.add', compact('level'));
    }

    public function update($id=null)
    {
        $level = [
            0 => 'Petugas',
            1 => 'Admin'
        ];

        if (is_null($id)) {
            $id = Auth::id();
        } elseif (!Auth::user()->level) {
            $id = Auth::id();
        }
        $data = User::find($id);
        return view('User.edit', compact('data', 'level'));
    }

    public function processCreate(Request $request)
    {
        try {
            DB::beginTransaction();
            User::create($request->all());
            DB::commit();
            return redirect()->route('user.index')->with(['msg' => 'Berhasil Menambahkan Data User', 'type' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('user.add')->with(['msg' => 'Gagal Menambahkan Data User', 'type' => 'danger']);
        }
    }

    public function processUpdate(Request $request)
    {
        try {
            DB::beginTransaction();
            User::find($request->id)->update($request->except('id'));
            DB::commit();
            return redirect()->route('user.index')->with(['msg' => 'Berhasil Mengubah Data User', 'type' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('user.edit')->with(['msg' => 'Gagal Mengubah Data User', 'type' => 'danger']);
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            User::find($id)->delete();
            DB::commit();
            return redirect()->route('user.index')->with(['msg' => 'Berhasil Menghapus Data User', 'type' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('user.index')->with(['msg' => 'Gagal Menghapus Data User', 'type' => 'danger']);
        }
    }

    public function elementsAdd(Request $request)
    {
        $data = Session::get('data-user');
        $data[$request->name] = $request->value;
        Session::put('data-user', $data);
        return response(1);
    }
}