<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
   protected $fillable = [
    'nom', // Name
    'catégorie', // Category
    'quantite', // Quantity
    'prix_detail', // Price detail
    'prix_gros', // Price gros
    'quantite_gros', // Quantity for wholesale
    'description', // Description
    'image', // Image
    'sous_categorie_id', // Image
    'created_by', // Image
   ];

    public function sous_categorie()
    {
         return $this->belongsTo(SousCategorie::class, 'sous_categorie_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // public function categorie()
    // {
    //      return $this->belongsToT(Categorie::class, SousCategorie::class, 'sous_categorie_id');
    // }

}
