<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getByCategory(int $limit_count = 5)
    {
        return $this->posts()->with('tag')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
        'name',
    ];
}