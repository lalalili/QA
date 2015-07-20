<?php namespace App\Qa\Entities;

use Illuminate\Database\Eloquent\Model;

class Site extends \Eloquent
{

    protected $connection = 'mysql';

    public $table = "sites";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"notes",
		"is_active"
	];

    public function status()
    {
        return $this->hasMany('App\Qa\Entities\Status');
    }

}
