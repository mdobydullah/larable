<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;
use Obydul\Larable\Like\Traits\Likeable;
use Obydul\Larable\Like\Traits\Liker;

class User extends Model
{
    use Liker;
    use Likeable;

    protected $fillable = ['name'];
}
