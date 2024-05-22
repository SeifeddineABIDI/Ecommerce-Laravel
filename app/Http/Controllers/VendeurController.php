<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendeurController extends Controller
{
    public function index()
    {
        return view('vendeur.dashboardVendeur');
    }
}