<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puppy extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
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
        'meetup_address',
        'meetup_address1',
        'status'
    ];

    protected $casts=[
        'user_id' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

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
