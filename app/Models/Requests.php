<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $table = 'requests';
    protected $fillable = ['user_id', 'project_id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function student()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
