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
}
