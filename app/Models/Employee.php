<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';

    public function spkos()
    {
        return $this->hasMany(Spko::class, 'employee', 'id_employee');
    }
}
