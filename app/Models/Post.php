<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'created_by'
    ];

    public $timestamps = true;
}

