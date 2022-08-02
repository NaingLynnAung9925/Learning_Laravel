<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;
    protected $table = 'test_posts';
    protected $fillable = [
        'title','body','image'
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'test_post_category');
    }
}
