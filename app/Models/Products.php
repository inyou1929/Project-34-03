<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    use HasFactory;

    protected $fillable = [

        'name',
        'type',
        'price',
        'image',

    ];

    public function Type()
    {
        return $this->belongsTo(type::class, 'type', 'id')
        ;
    }

}
