<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $table = 'treniruote';
    public $timestamps = false;

    public function treneris()
    {
        return $this->belongsTo('App\Models\Trainer');
    }
    public function treniruotes_tipas()
    {
        return $this->belongsTo('App\Models\Training_type', 'tipas', 'id');
    }
    public function sale()
    {
        return $this->belongsTo('App\Models\Sale', 'sales_id', 'id');
    }
    public function visits()
    {
        return $this->belongsToMany('App\Models\Client', 'treniruotes_vizitas', 'treniruote_id', 'id');
    }
}
