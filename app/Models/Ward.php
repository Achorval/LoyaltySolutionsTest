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
     * Return lga relationship.
     *
     * @return 
     */
    public function lga() 
    {
        return $this->belongsTo(Lga::class);
    }

    /**
     * Return citizen relationship.
     *
     * @return 
     */
    public function citizens() 
    {
        return $this->hasMany(Citizen::class);
    }
}
