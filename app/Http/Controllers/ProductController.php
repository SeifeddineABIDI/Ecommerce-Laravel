<?php

namespace App\Http\Controllers;
use App\Models\Categorie;

use App\Models\Product;
use App\Models\SousCategorie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function liste_product()
    {
        $products = Product::where('created_by', auth()->user()->id)->with('sous_categorie')->get();
        return view('product.liste', compact('products'));
    }

    
    public function ajouter_product()
    {
        $categories = Categorie::all();
        $sous_categories = SousCategorie::all();
        return view('product.ajouter', compact('categories', 'sous_categories'));
    }
    public function index(){
       
        return view('shop.index');    }

        public function list()
        {
            $products = Product::all();
            return view('shop.index', compact('products'));
        }
   
    public function ajouter_product_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer',
            'prix_detail' => 'required|numeric',
            'prix_gros' => 'required|numeric',
            'quantite_gros' => 'required|integer',
            'description' => 'required|string',
            'sous_categorie_id' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
    
        $product = new Product();
        $product->nom = $request->nom;
        $product->quantite = $request->quantite;
        $product->prix_detail = $request->prix_detail;
        $product->prix_gros = $request->prix_gros;
        $product->quantite_gros = $request->quantite_gros;
        $product->description = $request->description;
        $product->sous_categorie_id = $request->sous_categorie_id;
        $product->created_by = auth()->user()->id ;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/products/'), $filename);
            $product->image = $filename;
        }

        $product->save();
    
        return redirect('/product')->with('status','Le produit a bien été ajouté avec succès.');
    }
    
    public function update_product($id)
    {
        $products = product :: find($id);
        return view('product.update', compact('products'));
    }
    public function update_product_traitement(Request $request){
        $request->validate([
            'nom' => 'required',
            'quantite' => 'required',
            'prix_detail' => 'required',
            'prix_gros' => 'required',
            'quantite_gros' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $product = Product::find($request->id);
        $product->nom = $request->nom;
        $product->quantite = $request->quantite; 
        $product->prix_detail = $request->prix_detail; 
        $product->prix_gros = $request->prix_gros; 
        $product->quantite_gros = $request->quantite_gros; 
        $product->description = $request->description; 
        $product->image = $request->image; 
        $product->update();
        return redirect('/product');
    }
    
public function delete_product($id){
    $product = Product::find($id);
    $product->delete();
    return redirect('/product');
}
public function show($id)
{
    $product = Product::find($id);
    if (!$product) {
        return redirect()->back()->with('error', 'Product not found!');
    }
    return view('product.details', compact('product'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
