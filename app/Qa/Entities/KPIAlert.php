<?php namespace App\Qa\Entities;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Model as Eloquent;

class KPIAlert extends \Moloquent
{
    public $collection = 'KPIAlert';
}
