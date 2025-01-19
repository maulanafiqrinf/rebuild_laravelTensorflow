<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\client;
use App\Models\blog;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $clients = client::where('category', 'client')->get();
        $services = client::where('category', 'service')->get();
        $blogs = blog::where('option', 'visibilty')->get();
        return view('frontend', compact('clients', 'services', 'blogs'));
        
    }
}