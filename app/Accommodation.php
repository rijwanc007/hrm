<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    protected $fillable = [
        'grade_id',
        'designation_id',
        'dhaka',
        'divisional_town',
        'other_area',
    ];

    protected $table= 'accommodations';
}
