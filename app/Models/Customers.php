<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    // public    $primarykey='agentid';
    public $timestamps = false;
    protected $primaryKey = 'customerid';
    protected $fillable = [
        'fullName',
        'gender',
        'dob',
        'address',
        'phone',
        'platenumber',
        'created_by',
    ];
}
