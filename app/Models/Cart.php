<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'prekiu_krepselis';
    public $timestamps = false;

    public function prekes() {
        return $this->belongsToMany(Shop::class, 'krepselio_preke', 'krepselio_id', 'prekes_id');
    }
}
