<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type'
    ];

    //Many Features belongsToMany Properties -> Many to Many -> Property features serves as an intermediary table
    //Allowing for one to many relationships to either table

    //One Feature record belongsToMany Property records
    function properties(){
        return $this->belongsToMany(Property::class, 'property_features');
    }
}
