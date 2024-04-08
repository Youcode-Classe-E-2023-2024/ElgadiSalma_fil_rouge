<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'pharmacie_id',
        'medicament_id',
        'number',
        'dateDepart',
        'dateArrive',
        'requested_by',
        'accepted',
        'dateExpiration',
    ];

    protected $table = 'commande';
}
