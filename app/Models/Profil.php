<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'profils';

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }
}
