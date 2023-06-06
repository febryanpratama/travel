<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    // protected $table = 'notifikasi';
    protected $guarded = ['id'];

    public function rental()
    {
        return $this->belongsTo(Rental::class, 'id_rental', 'id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'id_pelanggan', 'id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'pengirim_id', 'id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'penerima_id', 'id');
    }
}
