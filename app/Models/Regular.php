<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regular extends Model
{
    protected $connection = 'mysql';

    public $table = "regulars";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"notes"
	];

	public static $rules = [
	    "name" => "required"
	];

    public function status()
    {
        return $this->hasMany('App\Models\Status');
    }

    public function subversion()
    {
        return $this->hasMany('App\Models\SubVersion');
    }

}
