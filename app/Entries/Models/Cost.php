<?php

namespace App\Entries\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

    public function entry()
    {
        return $this->belongsTo(Entry::class, 'entyId', 'id');
    }
}
