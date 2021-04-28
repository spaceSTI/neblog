<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $title
 * @property string $brief
 * @property ?string $article
 * @property string $status
 * @property string $keywords
 * @property Carbon $created_at
 *
 * Relations:
 *
 * @property-read Tag[] $tags
 *
 * @method static findOrFail(int $id): Article
 * @method static paginate(int $pageSize): LengthAwarePaginator
 */
class Article extends Model
{
    use HasFactory;

    public const
        STATUS_PUBLIC = 'public',
        STATUS_PRIVATE = 'private',
        STATUS_DRAFT = 'draft';

    public const STATUSES = [
        self::STATUS_PUBLIC,
        self::STATUS_PRIVATE,
        self::STATUS_DRAFT,
    ];

    protected $table = 'articles';

    public $timestamps = false;

    public function getCreatedAtAttribute(string $value): Carbon
    {
        return new Carbon($value);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
