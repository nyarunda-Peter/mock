<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];
    //protected $fillable = ['title', 'excerpt', 'body'];

    /**
     * The model's default values for attributes
     * 
     * @var array
     */
    protected $attributes = [
        'approved_status' => '0',
        'property_status' => '0'
    ];

    //Not advisable as it might load relationships even when not needed -> make helper method or use ->without(['attributes to ignore'])
    protected $with = ['category','type', 'author'];

    public function scopeFilter($query, array $filters) //Property::newQuery()->filter()
    {
       // $query->where
       if($filters['search'] ?? false){
            $query
                ->where('title', 'like', '%'. request('search') . '%')
                ->orWhere('body', 'like', '%'. request('search') . '%');
        }


    }

    public function category(){
        //hasOne, hasMany, belongTo, belongsToMany
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function type(){
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

