<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    protected $guarded = [
         'id',
    ];
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // 
    public function profils():BelongsTo
    {
        return $this->belongsTo(Profil::class, 'profil_id');
    }


    public function access_rights(): BelongsToMany
    {
        return $this->belongsToMany(Access_right::class);
    }

    //** Un utilisaleur peut gérer plusieurs magasins */
    public function magasins(): HasMany
    {
        return $this->hasMany(Magasin::class, 'magasin_id');
    }

    //** Un utilisaleur peut gérer plusieurs articles */
    public function articles(): HasMany
    {
        return $this->HasMany(Article::class, 'article_id');
    }
}
