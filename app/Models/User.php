<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    public function roleId()
    {
        return $this->hasOne('App\role');
    }

    public function CreatorId()
    {
        return $this->belongsTo('App\Posts', 'id', 'creatorId');
    }

    public function OwnerId()
    {
        return $this->belongsTo('App\Posts', 'id', 'ownerId');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'secondName',
        'password',
        'dateOfBirth',
        'photo',
        'roleId',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'dateOfBirth' => 'datetime',
    ];
}
