<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function index()
    {
        $santris = Santri::latest()->get();
        return view('admin.pages.santri.index', compact('santris'));
    }

    public function create()
    {
        $jabatans = Jabatan::all();
        return view('admin.pages.santri.create', compact('jabatans'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required|string',
            'room' => 'required|string',
            'status' => 'required',
            'institute' => 'required|string',
            'address' => 'required|string',
            'birthplace' => 'required|string',
            'born' => 'required|date',
            'year_out' => 'required|date',
        ]);

        $date = date('H-i-s');
        $request->file('photo')->move('upload/photo', $date . $request->file('photo')->getClientOriginalName());
        $request->photo = $date . $request->file('photo')->getClientOriginalName();

        $data = $request->all();
        Santri::create($data);

        return redirect('/admin/santri')->with('success', "Santri $request->name berhasil ditambahkan!");
    }

    public function edit($id)
    {
        $jabatans = Jabatan::all();
        $santri = Santri::find($id);
        return view('admin.pages.santri.edit', compact('santri', 'jabatans'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required|string',
            'room' => 'required|string',
            'status' => 'required',
            'institute' => 'required|string',
            'address' => 'required|string',
            'birthplace' => 'required|string',
            'born' => 'required|date',
            'year_out' => 'required|date',
        ]);

        if ($request->file('image')) {
            $date = date('H-i-s');
            $request->file('image')->move('upload/photo', $date . $request->file('image')->getClientOriginalName());
            $request->photo = $date . $request->file('image')->getClientOriginalName();
        }

        Santri::find($id)->update($request->all());

        return redirect('/admin/santri')->with('success', "Santri $request->name berhasil diubah!");
    }

    public function destroy($id)
    {
        $santri = Santri::find($id);
        $santri->delete();
        return redirect('/admin/santri')->with('success', "Santri $santri->name berhasil dihapus!");
    }
}
