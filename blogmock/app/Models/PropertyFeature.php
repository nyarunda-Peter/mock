<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    protected $table = 'property_features';

    protected $fillable = [
        'property_id',
        'feature_id'
    ];

    //Databse Relationships

    //One record belongsTo One Property
    function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

    //One record Belongs to one Feature
    function feature(){
        return $this->belongsTo(Feature::class, 'feature_id');
    }
}
