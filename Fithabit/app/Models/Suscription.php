<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscription extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'user_id',
        'id_suscription_type',
        'suscription_date',
        // Otros campos que puedan ser llenados de forma masiva
    ];

    public function suscriptionType()
{
    return $this->belongsTo(Suscription_Type::class, 'id_suscription_type');
}

public function user()
{
    return $this->belongsTo(User::class, 'id_user');
}

}
