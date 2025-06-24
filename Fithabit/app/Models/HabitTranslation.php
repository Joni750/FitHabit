<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HabitTranslation extends Model
{
    use HasFactory;

    public $fillable = ['name', 'value'];

    public function habitTranslated() {
        return $this->belongsTo(Habit::class, "id");
    }


}
