<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'expiration',
        'image',
        
    ];

    protected $table = 'medicament';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
