<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.pages.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.pages.testimonial.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'job' => 'required|string',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publish' => 'required',
        ]);

        $date = date('H-i-s');
        $request->file('photo')->move('upload/testimonial', $date . $request->file('photo')->getClientOriginalName());
        $photo = $date . $request->file('photo')->getClientOriginalName();

        Testimonial::create([
            'name' => $request->name,
            'job' => $request->job,
            'description' => $request->description,
            'photo' => $photo,
            'publish' => $request->publish,
        ]);

        return redirect('/admin/testimoni')->with('success', "Testimoni $request->name berhasil ditambahkan!");
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.pages.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'job' => 'required|string',
            'description' => 'required|string',
            'publish' => 'required',
        ]);

        $testimonial = Testimonial::find($id);

        if ($request->file('photo')) {
            $path = public_path("upload/testimonial/") . $testimonial->photo;
            unlink($path);

            $date = date('H-i-s');
            $request->file('photo')->move('upload/testimonial', $date . $request->file('photo')->getClientOriginalName());
            $testimonial->photo = $date . $request->file('photo')->getClientOriginalName();
        }

        $testimonial->update([
            'name' => $request->name,
            'job' => $request->job,
            'description' => $request->description,
            'publish' => $request->publish,
        ]);

        return redirect('/admin/testimoni')->with('success', "Testimoni $request->name berhasil diubah!");
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $path = public_path("upload/testimonial/") . $testimonial->photo;
        unlink($path);
        $testimonial->delete();
        return redirect('/admin/testimoni')->with('success', "Testimoni $testimonial->name berhasil dihapus!");
    }
}
