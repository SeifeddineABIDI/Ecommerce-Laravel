<?php

namespace App\Http\Controllers;

use App\Models\SousCategorie;
use Illuminate\Http\Request;
use App\Models\Categorie; // Ensure the Categorie model is imported

class SousCategorieController extends Controller
{
    // Display a list of sous-categories
    public function index()
    {
        $sousCategories = SousCategorie::all();
        return view('sous_categories.index', compact('sousCategories'));
    }

    // Show the form for creating a new sous-categorie
    public function create()
    {    $categories = Categorie::all();

        return view('sous_categories.create', compact('categories'));
    }

    // Store a newly created sous-categorie in the database
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $sousCategorie = new SousCategorie();
        $sousCategorie->description = $request->description;
        $sousCategorie->categorie_id = $request->categorie_id;
        $sousCategorie->save();

        return redirect()->route('sous_categories.index')->with('success', 'Sous-categorie created successfully.');
    }

    // Remove the specified sous-categorie from the database
    public function destroy(SousCategorie $sousCategorie)
    {
        $sousCategorie->delete();
        return redirect()->route('sous_categories.index')->with('success', 'Sous-categorie deleted successfully.');
    }
}
