<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'title' => 'string',
        'content' => 'string',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
