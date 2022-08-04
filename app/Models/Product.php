<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
        'id'
    ];
    //relación uno a muchos inversa
    public function brand(){
        return $this->belongsTo(Product::class);
    }
}
