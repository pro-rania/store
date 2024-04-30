<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;
class Category extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function myprod(){
        return $this->hasMany(Product::class);
    }
}
