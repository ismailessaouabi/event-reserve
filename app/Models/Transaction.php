<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'event_id',
        'paypal_transaction_id',
        'payer_email',
        'quantity',
        'total_price',
        'status'
    ];
}
