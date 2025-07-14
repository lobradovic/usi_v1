<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stavka extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'trenutna_cena',
        'kolicina',
        'rezervacija_id',
        'jelo_id',
    ];

    protected $searchableFields = ['*'];

    public function rezervacija()
    {
        return $this->belongsTo(Rezervacija::class);
    }

    public function jelo()
    {
        return $this->belongsTo(Jelo::class);
    }
}
