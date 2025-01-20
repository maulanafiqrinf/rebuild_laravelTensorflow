<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use App\Models\blog;
use App\Models\testimonial;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $clients = client::where('category', 'client')->get();
        $services = client::where('category', 'service')->get();
        $blogs = blog::where('option', 'visibilty')->get();
        $testimonials = testimonial::where('option', 'visibilty')->get();
        $clientsfooter = client::where('category', 'client')->get();

        return view('frontend', compact('clients', 'services', 'blogs','testimonials','clientsfooter'));
        
    }
}