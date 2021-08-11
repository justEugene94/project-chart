<?php

namespace App\Models\Chat\Message;

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
 * @property int    $message_id
 * @property bool $is_seen
 * @property bool $is_sender
 * @property bool $flagged
 *
 * Relationships:
 * @property Chat $chat
 * @property User $user
 * @property Chat\Message $message
 */
class Notification extends Model
{
    use HasFactory, SoftDeletes;

    /** @var string  */
    protected $table = 'message_notifications';

    /** @var array  */
    protected $fillable = [
        'chat_id',
        'user_id',
        'message_id',
        'is_seen',
        'is_sender',
        'flagged',
    ];

    /**
     * @return BelongsTo
     */
    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class, 'chat_id', 'id');
    }

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
    public function message(): BelongsTo
    {
        return $this->belongsTo(Chat\Message::class, 'message_id', 'id');
    }
}
