<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitale extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'pharmacie_id',
    ];

    protected $table = 'capitale';
}
