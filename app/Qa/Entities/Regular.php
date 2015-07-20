<?php namespace App\Qa\Entities;

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

    public function status()
    {
        return $this->hasMany('App\Qa\Entities\Status');
    }

    public function subversion()
    {
        return $this->hasMany('App\Qa\Entities\SubVersion');
    }

}
