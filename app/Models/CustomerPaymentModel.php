<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPaymentModel extends Model
{
    use HasFactory;
    protected $table = 'payment';
    public $timestamps = false;
    protected $primaryKey = 'paymentId';
    protected $fillable = [
        'customerid',
        'amount',
        'create_by'
    ];
}
