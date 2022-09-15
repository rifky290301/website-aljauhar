<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::latest()->get();
        return view('admin.pages.jabatan.index', compact('jabatans'));
    }

    public function create()
    {
        return view('admin.pages.jabatan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
        ]);

        $data = $request->all();
        Jabatan::create($data);

        return redirect('/admin/jabatan')->with('success', "Jabatan $request->name berhasil ditambahkan!");
    }

    public function edit($id)
    {
        $jabatan = Jabatan::find($id);
        return view('admin.pages.jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
        ]);

        Jabatan::find($id)->update($request->all());

        return redirect('/admin/jabatan')->with('success', "Jabatan $request->name berhasil diubah!");
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();
        return redirect('/admin/jabatan')->with('success', "Jabatan $jabatan->name berhasil dihapus!");
    }
}
