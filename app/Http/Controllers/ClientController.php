<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        if(auth()->user()->role !== 'client') {
            abort(403, 'Unauthorized action.');
        }
        return view('client.dashboardClient');
    }
}

