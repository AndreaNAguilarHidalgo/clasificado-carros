<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index(Request $request)
    {
        //$request->user()->authorizeRoles(['user', 'admin']);

        if(($request->user()->hasRole('admin')))
        {
            return view('dashboards.admin');
        }
        else
        {
            return view('dashboards.anunciante');
        }
        
    }
}
