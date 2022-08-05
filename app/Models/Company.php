<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Company will have employees.
    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id');
    }
}
