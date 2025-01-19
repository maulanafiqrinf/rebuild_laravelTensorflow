<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog;

class blogController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = blog::query();
            $blogs = $query->get();

            $title = 'Blog';
            return view('admin.blog.index', compact('blogs', 'title'));
        } catch (Exception $e) {
            return redirect()->route('blogs.index')->with('error', 'Terjadi kesalahan saat memuat data.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'nullable|string',
                'image' => 'nullable|string',
                'detail' => 'nullable|string',
                'option' => 'nullable|in:visibilty,hidden', 
            ]);

            // Menyimpan data yang divalidasi
            $data = $request->only([
                `nama`, `image`, `detail`, `option`
            ]);

            blog::create($data);

            return redirect()->route('blogs.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->route('blogs.index')->with('error', 'Terjadi kesalahan saat menambahkan data.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'nullable|string',
                'image' => 'nullable|string',
                'detail' => 'nullable|string',
                'option' => 'nullable|in:visibilty,hidden',
            ]);

            $blog = blog::findOrFail($id);

            // Menyimpan data yang divalidasi
            $data = $request->only([
                `nama`, `image`, `detail`, `option`
            ]);

            $blog->update($data);

            return redirect()->route('blogs.index')->with('success', 'Data berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->route('blogs.index')->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            $blog = blog::findOrFail($id);
            $blog->delete();

            return redirect()->route('blogs.index')->with('success', 'Data berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('blogs.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
