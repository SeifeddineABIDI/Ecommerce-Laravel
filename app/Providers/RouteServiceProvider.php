<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class RouteServiceProvider extends ServiceProvider
{
public const HOME = '/home'; // Default home

// Add new constants for client and vendor home
public const CLIENT_HOME = '/client/dashboardClient';
public const VENDOR_HOME = '/vendeur/dashboardVendeur';

// Update the home method to redirect based on role
protected function redirectTo()
{
    $role = Auth::user()->role;

    switch ($role) {
        case 'vendeur':
            return self::VENDOR_HOME;
        case 'client':
        default:
            return self::CLIENT_HOME;
    }
}
}