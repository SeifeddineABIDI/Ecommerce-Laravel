<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = 1; 
        $product = Product::find($productId); // Fetch the product details from the database

        $cart = Cache::get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'nom' => $product->nom,
                'prix_gros' => $product->prix_gros,
                'image' => $product->image,
                'quantite_gros' => $product->quantite_gros,
                'quantity' => $quantity // Add quantity to the product data
            ];
        }

        Cache::put('cart', $cart, now()->addMinutes(30)); // Store cart in cache for 30 minutes

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    public function index()
    {
        $cart = Cache::get('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get();

        $subtotal = 0;
        foreach ($cart as $product) {
            $subtotal += $product['prix_gros'] * $product['quantity'];
        }

        return view('cart.index', compact('cart', 'products', 'subtotal'));
    }

    public function remove(Request $request, $productId)
    {
        $cart = Cache::get('cart', []);
        \Log::info('Cart before removal: ', ['cart' => $cart, 'productId' => $productId]); // Log cart before removal

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Cache::put('cart', $cart, now()->addMinutes(30)); // Update the cache immediately
            \Log::info('Cart after removal: ', ['cart' => $cart, 'productId' => $productId]); // Log cart after removal
        } else {
            \Log::warning('Product ID not found in cart', ['productId' => $productId]);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart');
    }

    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
    
        // Validate the input
        if (!is_numeric($productId) || !is_numeric($quantity) || $quantity < 1) {
            return response()->json(['success' => false, 'message' => 'Invalid input data']);
        }
    
        $cart = Cache::get('cart', []);
        
        \Log::info('Updating cart', ['cart' => $cart, 'productId' => $productId, 'quantity' => $quantity]);
    
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            Cache::put('cart', $cart, now()->addMinutes(30));
            \Log::info('Updated cart', ['cart' => $cart]);
            return response()->json(['success' => true]);
        }
    
        \Log::warning('Product not found in cart', ['productId' => $productId, 'cart' => $cart]);
        return response()->json(['success' => false, 'message' => 'Product not found in cart']);
    }
    
    
    public function clearJustCache(Request $request)
{
    Cache::forget('cart');
    return response()->json(['success' => true]);
}

    public function clearCache()
    {
        Cache::forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cache cleared');
    }
}
