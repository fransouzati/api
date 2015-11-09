<?php

namespace Church;

use Church\Church;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $primaryKey = 'id';
    public $fillable = ['zipcode', 'street', 'number', 'district', 'city', 'state', 'country', 'phone1', 'phone2', 'phone3', 'email', 'website', 'latitude', 'longitude', 'comments', 'status'];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
