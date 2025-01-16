<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = [
    
        'dep_name',

    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
