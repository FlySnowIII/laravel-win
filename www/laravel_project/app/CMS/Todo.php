<?php

namespace App\CMS;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'title', 'memo'
    ];

}
