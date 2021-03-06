<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'address_id',
        'lastname',
        'birthdate',
        'code',
        'phonenumber'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
    public function hasRole($role)
    {
        if($this->role->name==$role){
            return true;
        }
        return false;
    }
    public function admin(){
        return $this->hasOne('App\Models\Admin');
    }
    public function trainer(){
        return $this->hasOne('App\Models\Trainer');
    }
    public function client(){
        return $this->hasOne('App\Models\Client');
    }
    public function address(){
        return $this->belongsTo('App\Models\Address');
    }
}
