<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected  $table = 'client';
    public $timestamps = false;
    protected $fillable = ['created_date', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id' , 'id');
    }
}
