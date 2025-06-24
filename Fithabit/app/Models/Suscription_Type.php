<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscription_Type extends Model
{
    use HasFactory;
    protected $table = 'suscription_types';

    protected $fillable = [
        'id',
        'name',
        'months',
        'price',
        'benefits',
    ];
    public function suscriptions()
    {
        return $this->hasMany(Suscription::class, 'id_suscription_type');
    }
}
