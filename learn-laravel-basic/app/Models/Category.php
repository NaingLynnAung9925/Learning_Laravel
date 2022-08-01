<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'test_categories';
    protected $fillable = [ 'name' ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'test_post_category');
    }
}
