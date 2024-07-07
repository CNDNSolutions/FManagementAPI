<?php

namespace App\Entries\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    public function cost()
    {
        return $this->hasMany(Cost::class, 'entryId', 'id');
    }
}
