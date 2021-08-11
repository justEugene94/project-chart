<?php

namespace App\Models\Chat;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int    $id
 * @property int    $chat_id
 * @property int    $user_id
 * @property string $body
 * @property string $type
 *
 * Relationships:
 * @property User $user
 * @property Chat $chat
 */
class Message extends Model
{
    use HasFactory, SoftDeletes;

    /** @var string  */
    protected $table = 'messages';

    protected $fillable = [
        'chat_id',
        'user_id',
        'body',
        'type'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class, 'chat_id', 'id');
    }
}
