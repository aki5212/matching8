<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Seeker extends Model
{
    use HasFactory;
    
    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Employer::class)->withTimestamps();
    }
}
