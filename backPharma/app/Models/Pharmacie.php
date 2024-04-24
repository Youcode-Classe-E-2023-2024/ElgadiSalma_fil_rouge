<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pharmacie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'city_id',
        'adresse',
        'created_by',
    ];

    protected $table = 'pharmacie';

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
   
}
