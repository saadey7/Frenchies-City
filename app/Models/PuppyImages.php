<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuppyImages extends Model
{
    use HasFactory;
    protected $fillable=[
        'puppy_id',
        'image',
    ];

    protected $casts = [
        'puppy_id' => 'integer',
    ];

    public function getImageAttribute($value)
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
