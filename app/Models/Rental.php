<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rental extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function auth()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }

    public function mobil()
    {
        return $this->hasMany(Mobil::class, 'rental_id', 'id')->withTrashed();
    }
}
