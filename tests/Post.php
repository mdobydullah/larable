<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;
use Obydul\Larable\Like\Traits\Likeable;

class Post extends Model
{
    use Likeable;

    protected $fillable = ['title'];
}
