<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Employee can only belong to one company at a time
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
