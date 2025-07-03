<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Article;

class Operation extends Model
{
    use HasFactory;

    protected $table = 'operations';

    public function articles():BelongsTo
    {
        return $this->BelongsTo(Article::class, 'article_id');
    }
}
