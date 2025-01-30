<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absence extends Model
{
    public $timestamps=true;protected $fillable = [
    
        'description',
        'hour',
        'turn',
        'user_id',
        'absenceDate',

    ];
    public function department():BelongsTo{

        return $this->belongsTo(User::class);
    }
}
