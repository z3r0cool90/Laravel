<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;


public function Jobs(){

    return $this->hasMany(Job::class);
}
public function User(): BelongsTo {
    return $this->belongsTo(User::class);
}

}
