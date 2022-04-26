<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int                      $id
 * @property string                   $text
 * @property int                      $user_id
 * @property bool                     $is_answer
 * @property \App\Models\User         $user
 * @property \App\Models\Message|null $answer
 * @property int                      $answer_id
 * @property \Carbon\Carbon           $created_at
 */
class Message extends Model
{
    protected $fillable = [
        'text',
        'is_answer',
    ];

    protected $casts = [
        'is_answer' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answer(): BelongsTo
    {
        return $this->belongsTo(static::class, 'answer_id');
    }
}
