<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    const UPLOAD_FOLDER = 'property';

    protected $fillable = [
        'path',
        'is_main'
    ];

    protected $casts = [
        'is_main' => 'boolean'
    ];

    protected $hidden = [
        'path'
    ];

    protected $appends = [
        'url'
    ];

    function property(){
        return $this->belongsTo(Property::class);
    }

    function getUrlAttribute(){
        return asset('storage/' . $this->path);
    }

}
