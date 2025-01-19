<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\client;
use App\Models\blog;

class frontendController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::where('category', 'client')->get();
        $services = Client::where('category', 'service')->get();
        $blogs = Blog::where('option', 'visibilty')->get();
        return view('frontend', compact('clients', 'services', 'blogs'));
        
    }
}