<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'pharmacie_id',
        'medicament_id',
        'number',
    ];

    protected $table = 'nombre_medicament';
}
