<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskAboutMe extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'puppy_id',
        'about_me',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'puppy_id' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function puppy()
    {
        return $this->belongsTo(Puppy::class, 'puppy_id');
    }
}
