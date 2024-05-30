<?php
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\SousCategorieController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AchatController;
use Illuminate\Support\Facades\Route;
Route::prefix('')->group(base_path('routes/auth.php'));

Route::get('/', [ProductController::class, 'shopWelcome']);

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
    Route::get('/shop', [ProductController::class, 'list'])->name('shop.index');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
    //CartRoutes
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear-cache', [CartController::class, 'clearCache'])->name('cart.clearCache');
    Route::post('/cart/clearcache', [CartController::class, 'clearJustCache'])->name('cart.clearCache');
    Route::post('/achat/store', [AchatController::class, 'store'])->name('achat.store');
    Route::post('/achat/confirmlocation', [AchatController::class, 'confirmlocation'])->name('achat.confirmlocation');
    
    Route::get('/article', [AchatController::class, 'viewPurchases'])->name('achat.articleClient');
    Route::get('/updateArticle/{id}', [AchatController::class, 'update'])->name('achat.updateArticle');

    Route::get('/articleVendeur', [AchatController::class, 'viewSales'])->name('achat.articleVendeur');
    Route::post('/achat/{id}/add-review', [AchatController::class, 'addReview'])->name('achat.addReview');
    Route::delete('/delete-categorie/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');
    Route::delete('/sous_categories/{sousCategorie}', [SousCategorieController::class, 'destroy'])->name('sous_categories.destroy');

    
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


