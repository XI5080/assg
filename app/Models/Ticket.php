<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon; //date/time library

class Ticket extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'events_id',
        'date',
        'time',
        'pax',
        'venues_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'name');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'events_id');
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class,'venues_id');
    }

    public function overdue()
    {
        return Carbon::now() > Carbon::parse($this["date"] . " " . $this["time"]);
    }

}
