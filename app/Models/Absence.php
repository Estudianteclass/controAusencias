<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absence extends Model
{
    public $timestamps=true;
    protected $fillable = [
    
        'description',
        'user_id',
        'hour',
        'turn',     
        'absence_date',

    ];

   
    public function user():BelongsTo{

        return $this->belongsTo(User::class);
    }
}
