<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'address', 'phone', 'ward_id'
    ];

    /**
     * Return ward relationship.
     *
     * @return 
     */
    public function ward() 
    {
        return $this->belongsTo(Ward::class);
    }
}
