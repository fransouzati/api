<?php

namespace Church;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $primaryKey = 'church_id';
    public $fillable = ['zipcode', 'street', 'number', 'district', 'city', 'state', 'country', 'phone1', 'phone2', 'phone3', 'email', 'website', 'latitude', 'longitude', 'comments', 'status'];
}
