<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'state_id'
    ];

    /**
     * Get the lga's state.
     *
     * @return 
     */
    public function state() 
    {
        return $this->belongsTo('App\Models\State');
    }
   
    /**
     * Get the lgas associated with wards.
     *
     * @return 
     */
    public function wards() 
    {
        return $this->hasMany('App\Models\Ward');
    }

}
