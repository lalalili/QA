<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $connection = 'mysql';

    protected $fillable = ['count'];
}
