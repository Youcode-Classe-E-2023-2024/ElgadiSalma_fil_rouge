<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicament_id',
        'pharmacie_id',
        'requested_by',
        'number',
        'dateDepart',
        'dateArrive',
        'dateExpiration',
        'accepted',
    ];

    protected $table = 'commande';
}
