<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatusUpdate extends Model
{
  use HasFactory;

  protected $fillable = [
    'order_id',
    'status',
    'performed_by',
    'note'
  ];

  public function order()
  {
    return $this->belongsTo(Order::class);
  }
  public function performer()
  {
    return $this->belongsTo(User::class, 'performed_by');
  }
}
