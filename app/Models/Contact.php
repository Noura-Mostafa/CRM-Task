<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
         'name' , 'address' , 'phone' , 'age' , 'work' , 'card number' , 'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Contact::class , 'user_id' , 'id');
    }
}
