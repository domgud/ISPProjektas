<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $table='trainer';
    public $timestamps=false;
    protected $fillable = ['user_id', 'work_start', 'end_work', 'state_id', 'experience'];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
