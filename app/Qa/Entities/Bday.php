<?php namespace App\Qa\Entities;

use Illuminate\Database\Eloquent\Model;

class Bday extends Model {

    protected $table = 'bdays';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['to', 'birthday'];
    protected $connection = 'mysql_bday';

}
