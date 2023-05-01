<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penyewaan extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
    public function customer()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
