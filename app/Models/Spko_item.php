<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spko_item extends Model
{
    use HasFactory;

    protected $table = 'spko_item';
    public $timestamps = false;

    public function spko_items()
    {
        return $this->belongsTo(Spko::class, 'ordinal', 'id_spko');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
}
