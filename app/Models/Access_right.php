<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Access_right extends Model
{
    use HasFactory;

    protected $table = 'access_rights';

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
