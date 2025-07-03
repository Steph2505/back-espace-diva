<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Magasin;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = ['categorie_id', 'code', 'couleur', 'description', 'entitled', 'type_stock', 'user_id', 'updated_at'];
    
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    
    public function categories():BelongsTo
    {
        return $this->belongsTo(Categorie::class,'categorie_id');
    }

    public function magasins(): BelongsToMany
    {
        return $this->belongsToMany(Magasin::class, 'operations', 'article_id', 'magasin_id');
    }
}
