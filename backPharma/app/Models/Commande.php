<?php

namespace App\Models;

use App\Models\Medicine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'addedToStock',
    ];

    protected $table = 'commande';

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicament_id');
    }
}
