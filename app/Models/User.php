<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'UserID';
    public $incrementing = true;

    protected $fillable = [
        'name',
        'RoleID',
        'email',
        'password',
        'login'
    ];

    public $timestamps = false;
}
