<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public function project()
    {
        return $this->belongsTo(PostsProject::class, 'project_id', 'id');
    }
    public function advisor()
    {
        return $this->belongsTo(Academic::class, 'advisor_id', 'user_id');
    }
    public function owner()
    {
        return $this->belongsTo(Student::class, 'owner_id', 'user_id');
    }
    public function student1()
    {
        return $this->belongsTo(Student::class, 'user1_id', 'user_id');
    }
    public function student2()
    {
        return $this->belongsTo(Student::class, 'user2_id', 'user_id');
    }
}
