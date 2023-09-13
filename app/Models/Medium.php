<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'board_id'];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}

