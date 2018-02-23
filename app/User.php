<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Ngt\Larafm\Database\Model;

class User extends Model
{
    use Notifiable;
    public $timestamps=false;
    protected $layoutName = 'ユーザー';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
