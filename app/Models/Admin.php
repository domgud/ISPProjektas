<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false;
    protected $table = 'admin';
    protected $fillable = ['id', 'work_start', 'end_work', 'state_id', 'user_id'];
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
