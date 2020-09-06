<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class Post extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Traits
    |--------------------------------------------------------------------------
    |
    */

    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    |
    */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'content',
        'published_at',
    ];

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Delete post image from storage
     *
     * @return void
     */
    public function deleteImage()
    {
       Storage::disk('public')->delete($this->image);
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Related category with posts
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
