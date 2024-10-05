<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employer extends Model
{
    use HasFactory;

    public function detail(): HasOne
    {
        return $this->hasOne(EmployerDetail::class);
    }    

    public function seekers(): BelongsToMany
    {
        return $this->belongsToMany(Seeker::class)->withTimestamps();
    }    
}
