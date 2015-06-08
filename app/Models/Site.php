<?php namespace App\Models;

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

	public static $rules = [
	    "name" => "required",
		"is_active" => "required|boolean"
	];

    public function status()
    {
        return $this->hasMany('App\Models\Status');
    }

}
