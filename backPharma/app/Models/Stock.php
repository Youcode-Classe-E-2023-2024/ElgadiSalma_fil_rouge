<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'medicament_id',
        'pharmacie_id',
        'initialNumber',
        'number',
        'price',
        'finished',
    ];

    protected $table = 'stock';
}
