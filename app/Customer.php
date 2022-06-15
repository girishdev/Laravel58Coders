<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Fillable Example (Which can be filled)
    // protected $fillable = ['name', 'email', 'status'];

    // Guarded Example (Which can not be filled)
    protected $guarded = [];

    // Declaring Scope (Naming convention start with "scope")
    public function scopeActive($query)
    {
        return $query->where('status' , 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('status' , 0);
    }

}
