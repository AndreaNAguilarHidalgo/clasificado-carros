<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);

        if(($request->user()->hasRole('user')))
        {
            return view('dashboards.anunciante');
        }
        else
        {
            return view('dashboards.administrador');
        }
        
    }
}