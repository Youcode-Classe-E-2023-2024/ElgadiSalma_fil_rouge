<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
