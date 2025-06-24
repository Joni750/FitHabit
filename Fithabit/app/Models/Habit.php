<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habit extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = ['name', 'image', 'value', 'quantity'];
    public $translatedAttributes = ['name', 'value'];

    public function habitLists() {
        return $this->hasMany(Habit_List::class, "id");
    }
    public function habitTrans() {
        return $this->hasMany(HabitTranslation::class, "habit_id");
    }

}
