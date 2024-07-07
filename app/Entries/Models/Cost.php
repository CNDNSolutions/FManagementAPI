<?php

namespace App\Entries\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

    protected $hidden = [
        'id',
        'entryId',
        'created_at',
        'updated_at'
    ];

    public function entry()
    {
        return $this->belongsTo(Entry::class, 'entyId', 'id');
    }
}
