<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'birthdate',
        'country',
        'img_url',
        'awards_actor_id'
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

    public function awards()
    {
        return $this->belongsTo(AwardsActor::class);
    }
}
