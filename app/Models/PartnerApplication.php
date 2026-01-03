<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerApplication extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'phone',
    'email',
    'city',
    'vehicle',
    'notes',
    'agreed',
    'ip',
    'ua',
    'status',
  ];
}
