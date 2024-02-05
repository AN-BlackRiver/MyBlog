<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'preview_image',
        'main_image',
        'category_id',
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags','post_id','tag_id');
    }
    protected $casts = [
        'content' => 'string',
    ];
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $this->mb_ucfirst($value),
            set: fn (string $value) => mb_strtolower($value),
        );
    }

    function mb_ucfirst(string $string): string
    {
        $firstChar = mb_substr($string, 0, 1);
        $then = mb_substr($string, 1, null);
        return mb_strtoupper($firstChar) . $then;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
