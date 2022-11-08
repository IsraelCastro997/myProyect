<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentProject extends Model
{
    use HasFactory;
    protected $fillable = ['id_comment','post_project','user_id','description'];
}

