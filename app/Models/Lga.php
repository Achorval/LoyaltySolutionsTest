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
     * Return state relationship.
     *
     * @return 
     */
    public function state() 
    {
        return $this->belongsTo(State::class);
    }
   
}
