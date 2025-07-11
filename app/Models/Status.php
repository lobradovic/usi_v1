<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['naziv_statusa'];

    protected $searchableFields = ['*'];

    public function rezervacijas()
    {
        return $this->hasMany(Rezervacija::class);
    }
}
