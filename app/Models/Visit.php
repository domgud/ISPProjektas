<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $table = 'treniruotes_vizitas';
    public $timestamps = false;

    protected $fillable = [
        'sukurimo_data',
        'tikslas',
        'client_id',
        'treniruote_id'
    ];

    public function treniruote()
    {
        return $this->belongsTo('App\Models\Training');
    }
}
