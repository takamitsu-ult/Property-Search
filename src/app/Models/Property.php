<?php
// app/Models/Property.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_name',
        'rent',
        'management_fee',
        'security_deposit',
        'key_money',
        'location',
        'layout',
        'floor_area',
        'floor_level',
        'total_floors',
        'building_type',
        'built_year',
        'structure',
        'facilities',
        'thumbnail_photo',
        'status',
    ];
}
