<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'genre',
        'country',
        'duration',
        'img_url'
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }
}
