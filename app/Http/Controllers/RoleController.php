<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;


class RoleController extends Controller
{
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role::all();
        return view('admin.pages.role.index', compact('roles'));
    }
}
