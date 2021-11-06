<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lga_id' 
    ];

    /**
     * Get the ward's lga.
     *
     * @return 
     */
    public function lga() 
    {
        return $this->belongsTo('App\Models\Lga');
    }

    /**
     * Get the wards associated with citizen.
     *
     * @return 
     */
    public function citizens() 
    {
        return $this->hasMany('App\Models\Citizen');
    }

    
}
