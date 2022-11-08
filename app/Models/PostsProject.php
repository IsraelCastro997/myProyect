<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PostsProject extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['title','user_id','career_id','tags','document','division','priority','schedule','experience','area','notes','image','likes'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
