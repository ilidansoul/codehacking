<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id',
        'name',
        'email',
        'password',
        'role_id',
        'foto_id',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden =
        [
        'password', 'remember_token',
        ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo', 'foto_id');
    }

    public function apakahAdmin()
    {
        if($this->role->name == 'Adminstrator')
        {
            return true;
        }
        return false;
    }

    public function post(){
        return $this->hasMany('App\Post');
    }
}
