<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posudba extends Model
{
    protected $table = 'posudbe';
    protected $fillable = ['clan_id', 'knjiga_id', 'datum_posudbe', 'datum_povratka'];

    public function clan()
    {
        return $this->belongsTo(Clan::class);
    }

    public function knjiga()
    {
        return $this->belongsTo(Knjiga::class);
    }
}
