<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use Illuminate\Http\Request;

class BiographyController extends Controller
{
    public function index()
    {
        $biography = Biography::latest()->get();
        return view('admin.pages.biografi.index', compact('biography'));
    }

    public function create()
    {
        return view('admin.pages.biografi.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'biography' => 'required|string',
            'position' => 'required|string',
            'publish' => 'required',
        ]);

        $date = date('H-i-s');
        $request->file('photo')->move('upload/biography', $date . $request->file('photo')->getClientOriginalName());
        $photo = $date . $request->file('photo')->getClientOriginalName();

        Biography::create([
            'name' => $request->name,
            'photo' => $photo,
            'biography' => $request->biography,
            'position' => $request->position,
            'publish' => $request->publish,
        ]);

        return redirect('/admin/biografi')->with('success', "Biografi $request->name berhasil ditambahkan!");
    }

    public function edit($id)
    {
        $biography = Biography::find($id);
        return view('admin.pages.biografi.edit', compact('biography'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'biography' => 'required|string',
            'position' => 'required|string',
            'publish' => 'required',
        ]);

        $biography = Biography::find($id);

        if ($request->file('photo')) {
            unlink("upload/biography/" . $biography->photo);
            $date = date('H-i-s');
            $request->file('photo')->move('upload/biography', $date . $request->file('photo')->getClientOriginalName());
            $biography->photo = $date . $request->file('photo')->getClientOriginalName();
        }

        $biography->update([
            'name' => $request->name,
            'biography' => $request->biography,
            'position' => $request->position,
            'publish' => $request->publish,
        ]);

        return redirect('/admin/biografi')->with('success', "Biografi $request->name berhasil diubah!");
    }

    public function destroy($id)
    {
        $biography = Biography::find($id);
        unlink("upload/biography/" . $biography->photo);
        $biography->delete();
        return redirect('/admin/biografi')->with('success', "Biografi $biography->name berhasil dihapus!");
    }
}
