<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\testimonial;

class testimonialController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = testimonial::query();
            $testimonials = $query->get();

            $title = 'testimonial';
            return view('admin.testimonial.index', compact('testimonials', 'title'));
        } catch (Exception $e) {
            return redirect()->route('testimonials.index')->with('error', 'Terjadi kesalahan saat memuat data.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'nullable|string',
                'detail' => 'nullable|string',
                'icon' => 'nullable|string',
                'namaorg' => 'nullable|string',
                'jabatanorg' => 'nullable|string',
                'option' => 'nullable|in:visibilty,hidden', 
            ]);

            // Menyimpan data yang divalidasi
            $data = $request->only([
                `title`, `detail`, `icon`, `namaorg`, `jabatanorg`, `option`
            ]);

            testimonial::create($data);

            return redirect()->route('testimonials.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->route('testimonials.index')->with('error', 'Terjadi kesalahan saat menambahkan data.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'nullable|string',
                'detail' => 'nullable|string',
                'icon' => 'nullable|string',
                'namaorg' => 'nullable|string',
                'jabatanorg' => 'nullable|string',
                'option' => 'nullable|in:visibilty,hidden', 
            ]);

            $testimonial = testimonial::findOrFail($id);

            // Menyimpan data yang divalidasi
            $data = $request->only([
                `title`, `detail`, `icon`, `namaorg`, `jabatanorg`, `option`
            ]);

            $testimonial->update($data);

            return redirect()->route('testimonials.index')->with('success', 'Data berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->route('testimonials.index')->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            $testimonial = testimonial::findOrFail($id);
            $testimonial->delete();

            return redirect()->route('testimonials.index')->with('success', 'Data berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('testimonials.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
