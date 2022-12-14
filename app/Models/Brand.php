<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at',
        'updated_at',
        'id'
    ];
     //relación uno a muchos 
    public function products(){
        return $this->hasMany(Product::class);
    }
}
