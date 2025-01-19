<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client;
use Exception;

class clientController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = client::query();
            $clients = $query->where('category', 'client')->get();

            $title = 'Klien';
            return view('admin.client.index', compact('clients', 'title'));
        } catch (Exception $e) {
            return redirect()->route('clients.index')->with('error', 'Terjadi kesalahan saat memuat data.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'nullable|string',
                'image' => 'nullable|string',
                'detail' => 'nullable|string',
                'category' => 'nullable|in:service,client', 
            ]);

            // Menyimpan data yang divalidasi
            $data = $request->only([
                'nama', 'image', 'detail', 'category'
            ]);

            client::create($data);

            return redirect()->route('clients.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->route('clients.index')->with('error', 'Terjadi kesalahan saat menambahkan data.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'nullable|string',
                'image' => 'nullable|string',
                'detail' => 'nullable|string',
                'category' => 'nullable|in:service,client', 
            ]);

            $client = client::findOrFail($id);

            // Menyimpan data yang divalidasi
            $data = $request->only([
                'nama', 'image', 'detail', 'category'
            ]);

            $client->update($data);

            return redirect()->route('clients.index')->with('success', 'Data berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->route('clients.index')->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            $client = client::findOrFail($id);
            $client->delete();

            return redirect()->route('clients.index')->with('success', 'Data berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('clients.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

}