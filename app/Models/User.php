<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'email',
        'password',
        'photo',
        // 'role_id'

        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function projet(){
        return $this->hasMany(Projet::class);
 
     }
     public function roles(){
        return $this->belongsToMany(Role::class, "user_role", "user_id", "role_id");
    }
 
    
      public function hasRole($role){
         return $this->roles()->where("nom", $role)->first() ;
     }

     public function hasAnyRoles(array $roles){
        return $this->roles()->whereIn("nom", $roles)->first() ;
    }
 
     public function getAllRoleNamesAttribute(){
        return $this->roles->implode("nom", ' | ');
    }
}
