<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venue extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = [
     'location'
    ];
    protected $dates = [
        'deleted_at',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
