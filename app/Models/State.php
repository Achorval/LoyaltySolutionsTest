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
     * Return state relationship.
     *
     * @return 
     */
    public function lgas() 
    {
        return $this->hasMany(Lga::class);
    }

    public function getTotalCitizensAttribute()
    {
        // return $this->lgas->wards->citizens->count();
        // dd($this->lgas->wards());
        dd ($this->posts->count() );
    }

    public function citizens()
    {
        return $this->hasManyThrough(Citizen::class, Ward::class, Lga::class);
    }

    /**
     * Get all of the posts for the country.
     */
    public function posts()
    {
        return $this->hasManyThrough('App\Models\State', 'App\Models\Lga');
    }
}
