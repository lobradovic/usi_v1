<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rezervacija extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['datum', 'adresa', 'user_id', 'status_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'datum' => 'date',
    ];

    public function stavkas()
    {
        return $this->hasMany(Stavka::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
