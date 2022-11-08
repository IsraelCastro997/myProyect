<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Student;
use App\Models\Academic;
use App\Models\Project;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'document'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//consulta de base de datos
    public function student(){
        return $this->hasOne(Student::class);
    }

    public function project(){
       return $this->hasMany(Project::class);
    }

    public function academic(){
        return $this->hasOne(Academic::class);
     }

}
