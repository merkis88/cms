<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = [
        'post_id',
        'user_id',
        'selected_text',
        'comment'
    ];

    public $timestamps = true;
}
