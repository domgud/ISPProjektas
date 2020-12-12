<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email_letter extends Model
{
    use HasFactory;

    protected $table = 'el_laiskas';
    public $timestamps = false;

    protected $fillable = [
        'sukurimo_data',
        'tekstas',
        'adresas'
    ];
}
