<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','career_id','name_student','paternal_surname_student','maternal_surname_student','phone_student','code_student'];
    public function user(){
        return $this->belongsTo(User::class);
    }

}

