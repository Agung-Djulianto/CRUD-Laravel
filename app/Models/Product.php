<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    public function spko_items()
    {
        return $this->hasMany(Spko_item::class, 'id_product', 'id_product');
    }
}
