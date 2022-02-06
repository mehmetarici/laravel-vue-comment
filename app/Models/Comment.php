<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'body', 'username'];

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

}
