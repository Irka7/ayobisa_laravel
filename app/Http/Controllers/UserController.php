<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $data['roles'] = Roles::get();
        $data['users'] = User::orderBy('created_at', 'DESC')->get();
        return view('user.index', ['title' => 'Users'])->with($data);
    }

    public function store(Request $request) {
        $data = $request->all();
        // dd($data);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        if ($user)
        return redirect('user')->with('success', 'Data User berhasil ditambahkan!');
    }

    public function update(Request $request, User $user)
    {
        $data = $user->update($request->all());
        return redirect('user')->with('success', 'Data User Berhasil diubah!');
    }

    public function destroy(User $user)
    {
        $data = $user->delete();
        return redirect('user')->with('success', 'Data User berhasil dihapus!');
    }
}
