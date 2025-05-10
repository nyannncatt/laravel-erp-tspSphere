<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentsInfo extends Model
{
    protected $table = 'parents_info'; 

    protected $fillable = [
        'name',
        'email',
        'phone',
        'dob',
        'address',
        'occupation',
        'grade',
        'photo',
    ];
}
