<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Posudba;


class Knjiga extends Model
{
    use HasFactory;
    protected $table = 'knjige';
    protected $fillable = ['naslov', 'autor', 'godina_izdanja'];

    public function scopeAvailable($query)
    {
        return $query->where('posudena', false);
    }

    public function posudbe():HasMany
    {
        return $this->hasMany(Posudba::class);
    }

    
}
