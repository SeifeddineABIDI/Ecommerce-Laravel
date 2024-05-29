<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achat;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;


class AchatController extends Controller
{
    public function store(Request $request)
    {
        try {
            //code...
            $request->validate([
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric'
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('cart.index')->with('success', 'Veuillez indiquer votre adresse de livraison');
        }


        $cart = Cache::get('cart');
        if (isset($cart)) {
            # code...
            foreach ($cart as $id => $value) {
                # code...
                $achat = new Achat();
                $achat->product_id = $id;
                $achat->quantity = $value['quantity'];
                $achat->price = $value['prix_gros'] * $value['quantity'];
                $achat->user_id = auth()->id();
                $achat->save();
                Product::where('id', $id)->decrement('quantite', $value['quantity']);
            }

            $user = auth()->user();
            $user->latitude = $request->latitude;
            $user->longitude = $request->longitude;
            $user->save();
        }
        Cache::forget('cart');
        return redirect()->route('achat.articleClient')->with('success', 'Achat confirmé, veuillez indiquer votre adresse de livraison');

    }


    public function articleClient()
    {
        $achats = Achat::where('user_id', auth()->id())->get();
        return view('product.articleClient', compact('achats'));
    }
    
    public function viewPurchases(Request $request)
    {
        $sort_by = $request->get('sort_by', 'id');
        $sort_order = $request->get('sort_order', 'asc');

        $achats = Achat::where('user_id', auth()->user()->id)
                        ->with('product')
                        ->orderBy($sort_by, $sort_order)
                        ->get();

        return view('product.articleClient', compact('achats', 'sort_by', 'sort_order'));
    }
    public function update(Request $request, $id)
    {
        $achat = Achat::find($id);
        $achat->status = "Livré";
        $achat->save();
        return redirect()->back()->with('success', 'Achat mis à jour avec succès');
    }


    public function getAchatByUserId($id)
    {
        $achats = Achat::where('user_id', $id)->get();
        return view('product.articleVendeur', compact('achats'));
    }


    public function viewSales(Request $request)
    {
        
        $achats = Achat::whereHas('product', function ($query) {
            $query->where('created_by', auth()->user()->id);
        })
        ->with('product')
        ->get();

        /*
        $produits = Product::where('created_by', auth()->user()->id)->get();

        $achats = Achat::whereIn('product_id', $produits->pluck('id'))
            ->with('product')
            ->get();
        */
        return view('product.articleVendeur', compact('achats'));
    }
    public function addReview(Request $request, $id)
    {
        $request->validate([
            'review' => 'required|string',
        ]);
    
        $achat = Achat::findOrFail($id);
        $achat->review = $request->input('review');
        $achat->save();
    
        return redirect()->back()->with('success', 'Review added successfully.');
    }


}

