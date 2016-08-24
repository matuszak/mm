<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PortalController extends Controller
{
    public function index()
    {
        return view('portal.home.index');
    }
    public function about()
    {
        return view('portal.home.sessions.about');
    }
    public function services()
    {
        return view('portal.home.sessions.services');
    }
    public function contact()
    {
        return view('portal.home.sessions.contact');
    }
}
