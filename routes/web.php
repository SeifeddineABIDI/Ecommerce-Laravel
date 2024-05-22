<?php
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\SousCategorieController;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
Route::prefix('')->group(base_path('routes/auth.php'));

Route::get('/', function () {
    return view('shop.welcome');});
Route::get('/about', function () {
    return view('shop.about');});
Route::get('/dashboard', function () {
    return view('layouts.dashboard');});
Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/product', [ProductController::class, 'liste_product'])->name('liste_produits');
Route::get('/ajouter', [ProductController::class, 'ajouter_product'])->name('ajouter');
Route::post('/ajouter/traitement', [ProductController::class, 'ajouter_product_traitement']);
Route::post('/update/traitement', [ProductController::class, 'update_product_traitement']);
Route::get('/update-product/{id}', [ProductController::class, 'update_product']);
Route::get('/delete-product/{id}', [ProductController::class, 'delete_product']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/client/dashboardClient', [ClientController::class, 'index'])->name('client.dashboardClient');
    Route::get('/vendeur/dashboardVendeur', [VendeurController::class, 'index'])->name('vendeur.dashboardVendeur');
    //Route::get('/categorie/add', [CategorieController::class, 'add'])->name('vendeur.dashboardVendeur');
    Route::resource('categories', CategorieController::class);
    Route::resource('sous_categories', SousCategorieController::class);

    
});


/*
Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/dashboardClient', [ClientController::class, 'index'])->name('client.dashboardClient');
    // Add more client routes here
});

Route::middleware(['auth', 'role:vendeur'])->group(function () {
    Route::get('/vendeur/dashboardVendeur', [VendeurController::class, 'index'])->name('vendeur.dashboardVendeur');
    // Add more vendeur routes here
});*/
Route::get('/admin', function () {
    return view('admin.dashboard');
});

require __DIR__.'/auth.php';


