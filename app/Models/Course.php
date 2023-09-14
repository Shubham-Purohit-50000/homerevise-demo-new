<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'standard_id',
        'subject_id',
        'count',
        'status',
    ];

    public function standard()
    {
        return $this->belongsTo(Standard::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function activation()
    {
        return $this->hasMany(Activation::class);
    }
}