<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        's_payment_id',
        'user_id',
        'order_id',
        'valid_date',
        'amount'
   ];
}
