<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $brief
 * @property ?string $article
 * @property string $status
 * @property string $keywords
 * @property Carbon $created_at
 *
 * @method static findOrFail(int $id): Article
 * @method static paginate(int $pageSize): LengthAwarePaginator
 */
class Article extends Model
{
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

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function getCreatedAtAttribute(string $value): Carbon
    {
        return new Carbon($value);
    }
}
