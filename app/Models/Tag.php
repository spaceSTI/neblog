<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 *
 * Relations:
 *
 * @property-read Article[] $articles
 */
class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    public $timestamps = false;

 public function articles(): BelongsToMany
 {
        return $this->belongsToMany(Article::class);
    }
}
