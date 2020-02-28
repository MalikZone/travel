<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TravelPackage extends Model
{
    use SoftDeletes;

    protected $table = 'travel_package';
    protected $fillable =[
        'title', 'slug', 'location', 'about', 'featured_event', 
        'language', 'food', 'deperature_date', 'duration', 'type', 'price'
    ];


    // one to many relation from table travel_package to table galleries 
    public function galleries(){
        return $this->hasMany(Gallery::class, 'travel_package_id', 'id');
    }
}
