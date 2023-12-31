<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    //protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'image_path',
        'user_id',
        'tag_id',
    ];

    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('tags')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function like_users()
    {
        return $this->belongsToMany(User::class,'likes','post_id','user_id')->withTimestamps();
    }
}
