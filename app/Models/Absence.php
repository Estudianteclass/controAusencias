<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absence extends Model
{
    protected $fillable = [
        'user_id',
        'description',

    ];
    public function department():BelongsTo{

        return $this->belongsTo(User::class);
    }
}
