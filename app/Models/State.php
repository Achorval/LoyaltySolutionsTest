<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];


    /**
     * Get the states associated with lgas.
     *
     * @return 
     */
    public function lgas() 
    {
        return $this->hasMany('App\Models\Lga');
    }

    /**
     * Get the states associated with wards through lgas.
     */
    public function wards()
    {
        return $this->hasManyThrough('App\Models\Ward', 'App\Models\Lga');
    }
}
