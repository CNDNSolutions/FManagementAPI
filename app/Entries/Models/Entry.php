<?php

namespace App\Entries\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function costs()
    {
        return $this->hasMany(Cost::class, 'entryId', 'id');
    }
}
