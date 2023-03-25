<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;
use Obydul\Larable\Like\Traits\Likeable;

class Book extends Model
{
    use Likeable;

    protected $fillable = ['title'];
}
