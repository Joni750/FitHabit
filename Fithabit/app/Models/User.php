<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'dni',
        'password',
        'sex',
        'birth_day',
        'avatar',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'dni',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function role () {
        return $this->belongsTo(Role::class);
    }

    function isAdmin(){

        return $this->role->name === "admin";

    }

    public function suscriptions(){
        return $this->hasOne(Suscription::class, 'user_id');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function adminlte_image(){
        return "https://picsum.photos/300/300";
    }

    public function adminlte_desc(){
        return "administrador";
    }

    public function adminlte_profile_url(){
        return "profile/username";
    }
    public function habitLists() {
        return $this->hasMany(Habit_List::class, 'user_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_user');
    }


}
