<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jelo extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['naziv_jela', 'cena', 'opis'];

    protected $searchableFields = ['*'];

    public function stavkas()
    {
        return $this->hasMany(Stavka::class);
    }
}
