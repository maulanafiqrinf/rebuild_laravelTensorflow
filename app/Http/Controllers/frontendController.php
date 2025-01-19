<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\client;
use App\Models\tb_site;
use App\Models\blog;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $clients = client::where('category', 'client')->get() ?? collect([]);
        $services = client::where('category', 'service')->get() ?? collect([]);
        $blogs = blog::where('option', 'visibilty')->get() ?? collect([]);
        
        return view('frontend', compact('clients', 'services', 'blogs'));
        
        
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'hp' => 'required',
    //         'pesan' => 'required',
    //     ]);

    //     tb_contact::create($request->all());

    //     // Redirect ke homepage dengan pesan sukses
    //     return redirect()->route('frontend')
    //         ->with('success', 'Pesan berhasil terkirim.');
    // }
}