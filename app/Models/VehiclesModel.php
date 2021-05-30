<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiclesModel extends Model
{
  use HasFactory;
  protected $table = 'vehicles';
  public $timestamps = false;
  protected $primaryKey = 'vehicleid';
  protected $fillable = [
    'platenumber',
    'type',
    'created_by',
  ];
}
