<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'partner_applications';

    protected $fillable = [
        'nama_mitra',
        'email',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
