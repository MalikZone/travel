<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = 
    [
        'travel_package_id', 'images'
    ];


    // from table travel_packege
    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, 'travel_package_id', 'id');
    }
}