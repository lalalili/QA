<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $connection = 'mysql';

    protected $fillable = ['company', 'result', 'note1', 'note2', 'note3'];
}
