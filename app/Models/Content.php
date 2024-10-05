<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Content extends Model
{
    use HasFactory;

    // タイトル列の登録を許可する（ホワイトリスト）
    protected $fillable = ['nickname'];

    public function seekers(): HasMany
    {
        return $this->hasMany(seeker::class);
    }
}
