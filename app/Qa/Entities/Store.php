<?php namespace App\Qa\Entities;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Model as Eloquent;

class Store extends \Moloquent
{
    public $collection = 'Store';
}