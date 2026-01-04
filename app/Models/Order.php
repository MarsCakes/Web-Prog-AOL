<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'customer_name',
    'customer_phone',
    'address',
    'lat',
    'lng',
    'pricing_category_id',
    'photo_path',
    'service_method',
    'scheduled_at',
    'status',
    'assigned_driver_id',
    'eta',
    'tracking_code',
    'estimated_price'
  ];

  protected $casts = [
    'scheduled_at' => 'datetime',
    'eta' => 'datetime',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function driver()
  {
    return $this->belongsTo(User::class, 'assigned_driver_id');
  }
  public function category()
  {
    return $this->belongsTo(PricingCategory::class, 'pricing_category_id');
  }
  public function updates()
  {
    return $this->hasMany(OrderStatusUpdate::class);
  }
}
