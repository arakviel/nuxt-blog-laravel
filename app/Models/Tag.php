<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Tag alphabetical()
 * @method static \Database\Factories\TagFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag withSlug($slug)
 * @mixin \Eloquent
 */
class Tag extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    // Scope methods
    public function scopeWithSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopeAlphabetical($query)
    {
        return $query->orderBy('name', 'asc');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
