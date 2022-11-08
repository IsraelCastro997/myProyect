<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;

class Academic extends Model
{

    use HasFactory;
    protected $fillable = ['user_id','name_academic','paternal_surname_academic','maternal_surname_academic','phone_academic','code_academic'];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
