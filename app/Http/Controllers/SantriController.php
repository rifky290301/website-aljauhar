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
        $request->file('image')->move('upload/photo', $date . $request->file('image')->getClientOriginalName());
        $photo = $date . $request->file('image')->getClientOriginalName();

        Santri::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'room' => $request->room,
            'status' => $request->status,
            'institute' => $request->institute,
            'address' => $request->address,
            'birthplace' => $request->birthplace,
            'born' => $request->born,
            'year_of_entry' => $request->year_of_entry,
            'year_out' => $request->year_out,
            'photo' => $photo,
            'jabatan_id' => $request->jabatan_id,
        ]);

        return redirect('/admin/santri')->with('success', "Santri $request->name berhasil ditambahkan!");
    }

    public function show($id)
    {
        $santri = Santri::with('jabatan')->find($id);
        return view('admin.pages.santri.read', compact('santri'));
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
        
        $santri = Santri::findOrFail($id);

        if ($request->file('image')) {
            $date = date('H-i-s');
            $request->file('image')->move('upload/photo', $date . $request->file('image')->getClientOriginalName());
            $request->photo = $date . $request->file('image')->getClientOriginalName();

            $path = public_path("upload/photo/") . $santri->photo;
            unlink($path);
            $santri->photo = $request->photo;
        }

        $santri->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'room' => $request->room,
            'status' => $request->status,
            'institute' => $request->institute,
            'address' => $request->address,
            'birthplace' => $request->birthplace,
            'born' => $request->born,
            'year_of_entry' => $request->year_of_entry,
            'year_out' => $request->year_out,
            'jabatan_id' => $request->jabatan_id,
        ]);

        return redirect('/admin/santri')->with('success', "Santri $request->name berhasil diubah!");
    }

    public function destroy($id)
    {
        $santri = Santri::find($id);
        $path = public_path("upload/photo/") . $santri->photo;
        unlink($path);
        $santri->delete();
        return redirect('/admin/santri')->with('success', "Santri $santri->name berhasil dihapus!");
    }
}
