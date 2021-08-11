<?php

namespace App\Models;

use App\Models\Chat\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int    $id
 * @property bool   $private
 * @property string $data
 *
 * Relationships:
 * @property User[]    $users
 * @property Message[] $messages
 */
class Chat extends Model
{
    use HasFactory, SoftDeletes;

    /** @var string  */
    protected $table = 'chats';

    /** @var array  */
    protected $fillable = [
        'private',
        'data'
    ];

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'chat_users', 'chat_id', 'user_id');
    }

    /**
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'chat_id', 'id');
    }
}
