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
    protected $with = ['category','type', 'author', 'features'];

    protected $casts = [
        'overview' => 'array'
    ];

    public function scopeFilter($query, array $filters) //Property::newQuery()->filter()
    {
       // $query->where
       if($filters['search'] ?? false){
            $query
                ->where('title', 'like', '%'. request('search') . '%')
                ->orWhere('body', 'like', '%'. request('search') . '%');
        }


    }

    //Database Relations
    /**
     * hasOne-> One-to-One 
     * hasMany-> One-To-Many
     * belongTo-> One-To-One (Inverse)
     * belongsToMany-> One-To-Many (Inverse)
     */

    //One Property has Many features
    function features(){
        return $this->belongsToMany(Feature::class, 'property_features');
    }

    //One Property hasMany Images
    function images(){
        return $this->hasMany(PropertyImage::class);
    }

    //One Property belongsTo One Category
    public function category(){
        
        return $this->belongsTo(Category::class, 'category_id');
    }

    //One Property belongsTo One Type
    public function type(){
        return $this->belongsTo(Type::class, 'type_id');
    }

    //One Property belongsTo One Author
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

