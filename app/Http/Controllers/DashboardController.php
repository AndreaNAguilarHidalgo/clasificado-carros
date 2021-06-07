<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);

        if(($request->user()->hasRole('admin')))
        {
            return view('dashboards.administrador');
        }
        else
        {
            return view('dashboards.anunciante');
        }
        
    }
}