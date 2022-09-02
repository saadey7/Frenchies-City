<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puppy extends Model
{
    use HasFactory;
    protected $fillable=[
        'puppy_name',
        'puppy_breed',
        'puppy_price',
        'puppy_image',
        'mom_weight',
        'dad_weight',
        'available',
        'gender',
        'puppy_dob',
        'puppy_color',
        'puppy_short_description',
        'puppy_long_description',
    ];


    public function getPuppyImageAttribute($value)
    {
        if($value == null)
        {
           return null;
        }
        else
        {
            return asset('public/assets/images/puppyimages/' . $value);
        }

    }
}
