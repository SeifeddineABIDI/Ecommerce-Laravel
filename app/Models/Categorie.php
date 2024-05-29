<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categories';
    
    protected $fillable = [
        'description',
    ];
    public function sous_categories()
    {
        return $this->hasMany(SousCategorie::class, 'categorie_id');
    }
}
