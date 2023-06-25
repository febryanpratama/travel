<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobil extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'mobil_id', 'id');
    }

    public function supir()
    {
        return $this->belongsTo(Supir::class);
    }
}
