<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];
    //protected $fillable = ['title', 'excerpt', 'body'];

    public function category(){
        //hasOne, hasMany, belongTo, belongsToMany
        return $this->belongsTo(Category::class);
    }
    // public function type(){
    //     return $this->belongsTo(Type::class);
    // }
}
