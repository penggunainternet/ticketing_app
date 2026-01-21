<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeTicket extends Model
{
    protected $fillable = [
        'nama',
    ];

    public function tikets()
    {
        return $this->hasMany(Tiket::class);
    }
}
