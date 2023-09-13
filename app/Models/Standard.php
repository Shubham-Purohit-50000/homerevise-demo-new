<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $fillable = ['name', 'medium_id'];

    public function medium()
    {
        return $this->belongsTo(Medium::class);
    }
}
