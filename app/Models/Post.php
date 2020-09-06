<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class Post extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'content',
        'published_at',
    ];

    /**
     * Delete post image from storage
     *
     * @return void
     */
    public function deleteImage()
    {
       Storage::disk('public')->delete($this->image);
    }
}
