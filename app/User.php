<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'university_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function bossManager()
    {
        return $this->hasOne(BossManager::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function checkRussia()
    {
        if($this->university->country->currency == 'RUB'){
            return true;
        }

        return false;
    }

    public function manager()
    {
        return $this->hasOne(Manager::class);
    }

    public function managerStudents()
    {
        return $this->hasOne(Student::class, 'manager_id');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function authorizeRoles($roles)
    {
        if($this->hasAnyRole($roles)){
            return true;
        }

        abort(401, 'This action is unauthorized');
    }

    public function hasAnyRole($roles)
    {
        if(is_array($roles)){
            foreach ($roles as $role) {
                if($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }  

        return false;
    }    

    public function hasRole($role)
    {
        if(!$this->roles->where('name', $role)->isEmpty()){
            return true;
        } else {
            return false;
        }
    }
}
