<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardsActor extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function actors()
    {
        return $this->hasMany(Actor::class);
    }
}
