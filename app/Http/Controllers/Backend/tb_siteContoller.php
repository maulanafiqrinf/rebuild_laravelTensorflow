<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tb_site;
use Exception;

class tb_siteContoller extends Controller
{
    public function index(Request $request)
    {
        try {
            // Mengambil data tb_site dengan pagination dan pencarian
            $query = tb_site::query();
            $sites = $query->get(); // Pagination 10 item per halaman

            // Mengoper data ke view
            $title = 'Kelola Data Site';
            return view('admin.site.index', compact('sites', 'title'));
        } catch (Exception $e) {
            return redirect()->route('site.index')->with('error', 'Terjadi kesalahan saat memuat data.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'site1' => 'required|string',
                'site2' => 'nullable|string',
                'site3' => 'nullable|string',
                'site4' => 'nullable|string',
                'site5' => 'nullable|string',
                'site6' => 'nullable|string',
                'site7' => 'nullable|string',
                'site8' => 'nullable|string',
                'site9' => 'nullable|string',
                'site10' => 'nullable|string',
                'site11' => 'nullable|string',
            ]);

            // Menyimpan data yang divalidasi
            $data = $request->only([
                'site1', 'site2', 'site3', 'site4', 'site5', 
                'site6', 'site7', 'site8', 'site9', 'site10', 
                'site11',
            ]);

            tb_site::create($data);

            return redirect()->route('site.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->route('site.index')->with('error', 'Terjadi kesalahan saat menambahkan data.');
        }
    }

    public function edit($id)
    {
        try {
            $site = tb_site::findOrFail($id);
            return view('admin.site.edit', compact('site'));
        } catch (Exception $e) {
            return redirect()->route('site.index')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'site1' => 'required|string',
                'site2' => 'nullable|string',
                'site3' => 'nullable|string',
                'site4' => 'nullable|string',
                'site5' => 'nullable|string',
                'site6' => 'nullable|string',
                'site7' => 'nullable|string',
                'site8' => 'nullable|string',
                'site9' => 'nullable|string',
                'site10' => 'nullable|string',
                'site11' => 'nullable|string',
            ]);

            $site = tb_site::findOrFail($id);

            // Menyimpan data yang divalidasi
            $data = $request->only([
                'site1', 'site2', 'site3', 'site4', 'site5', 
                'site6', 'site7', 'site8', 'site9', 'site10', 
                'site11',
            ]);

            $site->update($data);

            return redirect()->route('site.index')->with('success', 'Data berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->route('site.index')->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            $site = tb_site::findOrFail($id);
            $site->delete();

            return redirect()->route('site.index')->with('success', 'Data berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('site.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
