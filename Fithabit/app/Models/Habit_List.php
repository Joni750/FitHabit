<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habit_List extends Model
{
    use HasFactory;
    protected $table = 'habit_lists';

    protected $fillable = ['user_id', 'id_habit', 'quantity_start', 'quantity_end'];


    public function habit() {
        return $this->belongsTo(Habit::class, "id_habit");
    }

   public function user() {
        return $this->belongsTo(User::class);
    }
}
