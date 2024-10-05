<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployerDetail extends Model
{
    use HasFactory;

    // ID以外を主キーにしている場合は$primaryKeyを定義する
    protected $primaryKey = 'employer_id';

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }    
}
