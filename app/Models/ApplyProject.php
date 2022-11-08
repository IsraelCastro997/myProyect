<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyProject extends Model
{
    use HasFactory;
    protected $table = 'apply_projects';
    protected $fillable = ['owner_id', 'user_id', 'project_id', 'status'];

    protected $guarded = ['created_at'];

    public function project()
    {
        return $this->hasOne(PostsProject::class, 'id', 'project_id');
    }
}
