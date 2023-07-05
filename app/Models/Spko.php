<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spko extends Model
{
    use HasFactory;

    protected $table = 'spko';
    public $timestamps = false;
    public function employees()
    {
        return $this->belongsTo(Employee::class, 'employee', 'id_employee');
    }

    public function spko_items()
    {
        return $this->hasMany(Spko_Item::class,'ordinal', 'id_spko');
    }
}
