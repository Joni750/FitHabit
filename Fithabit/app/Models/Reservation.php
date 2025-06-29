<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'people',
        'user_id',
        '_token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
