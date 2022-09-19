<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;

class UserController extends Controller
{
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        if (auth()->user()->hasRole('admin')){
            $users = User::latest()->get();
        } else {
            $users = User::whereHas("roles", function($q){ $q->where("name", "santri"); })->get();
        }
        return view('admin.pages.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role::all();
        $santris = Santri::select('santris.*')
            ->leftJoin('users', 'santris.id', '=', 'users.santri_id')
            ->whereNull('users.santri_id')
            ->get();
        return view('admin.pages.user.create', compact('santris', 'roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'santri_id' => 'required|integer',
        ]);

        $user = User::create([
            'email' => $request->email,
            'santri_id' => $request->santri_id,
            'password' => Hash::make($request->password),
        ]);

        if ($request->role_id == 1) {
            $user->assignRole('admin');
        } elseif ($request->role_id == 2) {
            $user->assignRole('pengurus');
        } else {
            $user->assignRole('santri');
        }

        return redirect('/admin/user')->with('success', "User $request->email berhasil ditambahkan!");
    }

    public function edit($id)
    {
        $user = User::find($id);
        $santri = Santri::all();
        return view('admin.pages.user.edit', compact('user', 'santri'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/user')->with('success', "User $user->email berhasil dihapus!");
    }

}
