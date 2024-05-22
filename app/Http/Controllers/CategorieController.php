<?php
namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    // Display a list of categories
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $category = new Categorie();
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

  


    // Remove the specified category from the database
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
