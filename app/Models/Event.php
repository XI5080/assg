<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public $timestamps = false;
    protected $fillable = [
        'eventName',
        'duration',
        'description',
        'eventType'
    ];

    public function venues()
    {
        return $this->belongsToMany(Venue::class);
    }
}
